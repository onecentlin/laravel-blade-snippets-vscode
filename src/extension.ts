import * as path from 'path';
import * as vscode from 'vscode';
import * as html from 'vscode-html-languageservice';
import * as lst from 'vscode-languageserver-types';
import * as nls from 'vscode-nls';
import { BladeFormattingEditProvider } from './providers/BladeFormattingEditProvider';
import { LanguageClient, LanguageClientOptions, ServerOptions, TransportKind, RequestType, TextDocumentPositionParams } from 'vscode-languageclient';

const service = html.getLanguageService()
const localize = nls.loadMessageBundle();

class DocumentHighlight implements vscode.DocumentHighlightProvider
{
    provideDocumentHighlights(document: vscode.TextDocument, position: vscode.Position, token: vscode.CancellationToken): vscode.DocumentHighlight[] | Thenable<vscode.DocumentHighlight[]> {
        let doc = lst.TextDocument.create(document.uri.fsPath, 'html', 1, document.getText());
        return (service.findDocumentHighlights(doc, position, service.parseHTMLDocument(doc)) as any);
    }
} // DocumentHighlight

export function activate(context: vscode.ExtensionContext) {

    let documentSelector: vscode.DocumentSelector = {
        language: 'blade'
    };

    context.subscriptions.push(vscode.languages.registerDocumentHighlightProvider(documentSelector, new DocumentHighlight));

    let bladeFormatCfg = vscode.workspace.getConfiguration('blade.format');
    if (bladeFormatCfg.get<boolean>('enable')) {
        context.subscriptions.push(vscode.languages.registerDocumentFormattingEditProvider(documentSelector, new BladeFormattingEditProvider));
        context.subscriptions.push(vscode.languages.registerDocumentRangeFormattingEditProvider(documentSelector, new BladeFormattingEditProvider));
    }

    // Set html indent
    const EMPTY_ELEMENTS: string[] = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'keygen', 'link', 'menuitem', 'meta', 'param', 'source', 'track', 'wbr'];
    vscode.languages.setLanguageConfiguration('blade', {
        indentationRules: {
            increaseIndentPattern: /<(?!\?|(?:area|base|br|col|frame|hr|html|img|input|link|meta|param)\b|[^>]*\/>)([-_\.A-Za-z0-9]+)(?=\s|>)\b[^>]*>(?!.*<\/\1>)|<!--(?!.*-->)|\{[^}"']*$/,
            decreaseIndentPattern: /^\s*(<\/(?!html)[-_\.A-Za-z0-9]+\b[^>]*>|-->|\})/
        },
        wordPattern: /(-?\d*\.\d\w*)|([^\`\~\!\@\$\^\&\*\(\)\=\+\[\{\]\}\\\|\;\:\'\"\,\.\<\>\/\s]+)/g,
        onEnterRules: [
            {
                beforeText: new RegExp(`<(?!(?:${EMPTY_ELEMENTS.join('|')}))([_:\\w][_:\\w-.\\d]*)([^/>]*(?!/)>)[^<]*$`, 'i'),
                afterText: /^<\/([_:\w][_:\w-.\d]*)\s*>$/i,
                action: { indentAction: vscode.IndentAction.IndentOutdent }
            },
            {
                beforeText: new RegExp(`<(?!(?:${EMPTY_ELEMENTS.join('|')}))(\\w[\\w\\d]*)([^/>]*(?!/)>)[^<]*$`, 'i'),
                action: { indentAction: vscode.IndentAction.Indent }
            }
        ],
    });

    // The server is implemented in node
    let serverModule = context.asAbsolutePath(path.join('server', 'out', 'htmlServerMain.js'));
    // The debug options for the server
    let debugOptions = { execArgv: ['--nolazy', '--inspect=6045'] };

    // If the extension is launch in debug mode the debug server options are use
    // Otherwise the run options are used
    let serverOptions: ServerOptions = {
        run: { module: serverModule, transport: TransportKind.ipc },
        debug: { module: serverModule, transport: TransportKind.ipc, options: debugOptions }
    };

    let embeddedLanguages = { css: true, javascript: true };
    // Options to control the language client
    let clientOptions: LanguageClientOptions = {
        documentSelector: ['blade'],
        synchronize: {
            configurationSection: ['blade', 'css', 'javascript', 'emmet'], // the settings to synchronize
        },
        initializationOptions: {
            embeddedLanguages
        }
    };

    // Create the language client and start the client.
    let client = new LanguageClient('blade', localize('bladeserver.name', 'BLADE Language Server'), serverOptions, clientOptions);
    client.registerProposedFeatures();
    context.subscriptions.push(client.start());
}

export function deactivate() {

}
