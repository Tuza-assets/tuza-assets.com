/**
 * @license Copyright (c) 2014-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

import { ClassicEditor } from '@ckeditor/ckeditor5-editor-classic';

import { Autoformat } from '@ckeditor/ckeditor5-autoformat';
import {
	Bold,
	Code,
	Italic,
	Strikethrough,
	Subscript,
	Superscript
} from '@ckeditor/ckeditor5-basic-styles';
import { BlockQuote } from '@ckeditor/ckeditor5-block-quote';
import { CodeBlock } from '@ckeditor/ckeditor5-code-block';
import type { EditorConfig } from '@ckeditor/ckeditor5-core';
import { Essentials } from '@ckeditor/ckeditor5-essentials';
import { FindAndReplace } from '@ckeditor/ckeditor5-find-and-replace';
import { FontBackgroundColor, FontColor, FontSize } from '@ckeditor/ckeditor5-font';
import { Heading } from '@ckeditor/ckeditor5-heading';
import { HorizontalLine } from '@ckeditor/ckeditor5-horizontal-line';
import { GeneralHtmlSupport } from '@ckeditor/ckeditor5-html-support';
import {
	AutoImage,
	Image,
	ImageCaption,
	ImageInsert,
	ImageResize,
	ImageStyle,
	ImageToolbar,
	ImageUpload
} from '@ckeditor/ckeditor5-image';
import { Indent, IndentBlock } from '@ckeditor/ckeditor5-indent';
import { AutoLink, Link, LinkImage } from '@ckeditor/ckeditor5-link';
import { List } from '@ckeditor/ckeditor5-list';
import { MediaEmbed } from '@ckeditor/ckeditor5-media-embed';
import { Paragraph } from '@ckeditor/ckeditor5-paragraph';
import { PasteFromOffice } from '@ckeditor/ckeditor5-paste-from-office';
import { StandardEditingMode } from '@ckeditor/ckeditor5-restricted-editing';
import { SelectAll } from '@ckeditor/ckeditor5-select-all';
import { ShowBlocks } from '@ckeditor/ckeditor5-show-blocks';
import { SpecialCharacters, SpecialCharactersText } from '@ckeditor/ckeditor5-special-characters';
import { Style } from '@ckeditor/ckeditor5-style';
import {
	Table,
	TableCaption,
	TableCellProperties,
	TableColumnResize,
	TableProperties,
	TableToolbar
} from '@ckeditor/ckeditor5-table';
import { TextTransformation } from '@ckeditor/ckeditor5-typing';
import { Undo } from '@ckeditor/ckeditor5-undo';
import { Base64UploadAdapter } from '@ckeditor/ckeditor5-upload';
import { WordCount } from '@ckeditor/ckeditor5-word-count';

// You can read more about extending the build with additional plugins in the "Installing plugins" guide.
// See https://ckeditor.com/docs/ckeditor5/latest/installation/plugins/installing-plugins.html for details.

class Editor extends ClassicEditor {
	public static override builtinPlugins = [
		AutoImage,
		AutoLink,
		Autoformat,
		Base64UploadAdapter,
		BlockQuote,
		Bold,
		Code,
		CodeBlock,
		Essentials,
		FindAndReplace,
		FontBackgroundColor,
		FontColor,
		FontSize,
		GeneralHtmlSupport,
		Heading,
		HorizontalLine,
		Image,
		ImageCaption,
		ImageInsert,
		ImageResize,
		ImageStyle,
		ImageToolbar,
		ImageUpload,
		Indent,
		IndentBlock,
		Italic,
		Link,
		LinkImage,
		List,
		MediaEmbed,
		Paragraph,
		PasteFromOffice,
		SelectAll,
		ShowBlocks,
		SpecialCharacters,
		SpecialCharactersText,
		StandardEditingMode,
		Strikethrough,
		Style,
		Subscript,
		Superscript,
		Table,
		TableCaption,
		TableCellProperties,
		TableColumnResize,
		TableProperties,
		TableToolbar,
		TextTransformation,
		Undo,
		WordCount
	];

	public static override defaultConfig: EditorConfig = {
		toolbar: {
			items: [
				'heading',
				'|',
				'bold',
				'italic',
				'link',
				'bulletedList',
				'numberedList',
				'fontSize',
				'fontBackgroundColor',
				'fontColor',
				'specialCharacters',
				'style',
				'strikethrough',
				'showBlocks',
				'subscript',
				'superscript',
				'|',
				'outdent',
				'indent',
				'|',
				'imageUpload',
				'imageInsert',
				'blockQuote',
				'insertTable',
				'mediaEmbed',
				'selectAll',
				'code',
				'codeBlock',
				'findAndReplace',
				'undo',
				'redo'
			]
		},
		language: 'en',
		image: {
			toolbar: [
				'imageTextAlternative',
				'toggleImageCaption',
				'imageStyle:inline',
				'imageStyle:block',
				'imageStyle:side',
				'linkImage'
			]
		},
		table: {
			contentToolbar: [
				'tableColumn',
				'tableRow',
				'mergeTableCells',
				'tableCellProperties',
				'tableProperties'
			]
		}
	};
}

export default Editor;
