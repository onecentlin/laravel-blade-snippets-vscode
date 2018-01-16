import * as vscode from 'vscode';
import * as html from 'vscode-html-languageservice';
import * as lst from 'vscode-languageserver-types';
import { BladeFormattingEditProvider } from './providers/BladeFormattingEditProvider';

const service = html.getLanguageService()

class DocumentHighlight implements vscode.DocumentHighlightProvider 
{
    provideDocumentHighlights(document: vscode.TextDocument, position: vscode.Position, token: vscode.CancellationToken): vscode.DocumentHighlight[] | Thenable<vscode.DocumentHighlight[]> {
        let doc = lst.TextDocument.create(document.uri.fsPath, 'html', 1, document.getText());
        return (service.findDocumentHighlights(doc, position, service.parseHTMLDocument(doc)) as any);
    }
} // DocumentHighlight

export function activate(context: vscode.ExtensionContext) {

    let documentSelector: vscode.DocumentSelector = {
        language: 'blade',
        scheme: 'file'
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
}

export function deactivate() {

}
