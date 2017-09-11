import * as vscode from 'vscode'
import * as html from 'vscode-html-languageservice'
import * as lst from 'vscode-languageserver-types'

const service = html.getLanguageService()

class DocumentHighlight implements vscode.DocumentHighlightProvider {
  provideDocumentHighlights(document: vscode.TextDocument, position: vscode.Position, token: vscode.CancellationToken): vscode.DocumentHighlight[] | Thenable<vscode.DocumentHighlight[]> {
    let doc = lst.TextDocument.create(document.uri.fsPath, 'html', 1, document.getText())
    return (service.findDocumentHighlights(doc, position, service.parseHTMLDocument(doc)) as any)
  }

}

class DocumentFormat implements vscode.DocumentFormattingEditProvider {
  provideDocumentFormattingEdits(document: vscode.TextDocument, options: vscode.FormattingOptions, token: vscode.CancellationToken): vscode.TextEdit[] | Thenable<vscode.TextEdit[]> {
    let doc = lst.TextDocument.create(document.uri.fsPath, 'html', 1, document.getText())
    let range = lst.Range.create(lst.Position.create(0, 0), lst.Position.create(doc.lineCount, 1))
    let format = (vscode.workspace.getConfiguration('html.format') as any)
    return (service.format(doc, range, format) as any)
  }

}

export function activate(context: vscode.ExtensionContext) {
  let documentSelector: vscode.DocumentSelector = {
    language: 'blade',
    scheme: 'file'
  };
  context.subscriptions.push(vscode.languages.registerDocumentHighlightProvider(documentSelector, new DocumentHighlight))
  context.subscriptions.push(vscode.languages.registerDocumentFormattingEditProvider(documentSelector, new DocumentFormat))
}

export function deactivate() {

}