export class BladeFormatter {
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

		// block pattern
		let patternBlock = /(\@)(inject|extends|section|hasSection|include|stop|endpush|endphp)/g;

		// blade format fix
		output = output.replace(patternBlock, function (match: string) {
			return "\n" + match;
		});

		output = output.replace(/(\s*)\@include/g, "\n" + this.indentPattern + "@include");
		output = output.replace(/(\s*)\@endsection/g, "\n@endsection\n");

		output = output.replace(/(\@(section|yield)\(.*\',.*|\@extends\(.*\))/g, function (match: string) {
			return match + "\n";
		});

		// fix #57 url extra space after formatting
		output = output.replace(/url\(\"(\s*)/g, "url\(\"");

		return output.trim();
	}
}

export interface IBladeFormatterOptions {
	insertSpaces?: boolean;
	tabSize?: number;
}
