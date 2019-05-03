export class BladeFormatter 
{
    newLine: string = "\n";
    indentPattern: string;

    constructor(options?: IBladeFormatterOptions) {
        options = options || {};

        // options default value
        options.tabSize = options.tabSize || 4;
        if (typeof options.insertSpaces === "undefined") {
            options.insertSpaces = true;
        }

        this.indentPattern = (options.insertSpaces) ? " ".repeat(options.tabSize) : "\t";
    }

    format(inuptText: string): string {
        
        let inComment: boolean = false;
        let output: string = inuptText;

        // fix #57 url extra space after formatting
        output = output.replace(/url\(\"(\s*)/g, "url\(\"");

        return output.trim();
    }
}

export interface IBladeFormatterOptions 
{
    insertSpaces?: boolean;
    tabSize?: number;
}
