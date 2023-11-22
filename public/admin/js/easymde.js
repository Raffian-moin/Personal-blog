var token = "{{ csrf_token() }}";
const editor = new EasyMDE({
    element: document.getElementById("easy-mde-text-editor"),
    // autoDownloadFontAwesome: false
    autofocus: true,
    // autosave: {
    //     enabled: true,
    //     uniqueId: "MyUniqueID",
    //     delay: 1000,
    //     submit_delay: 5000,
    //     timeFormat: {
    //         locale: 'en-US',
    //         format: {
    //             year: 'numeric',
    //             month: 'long',
    //             day: '2-digit',
    //             hour: '2-digit',
    //             minute: '2-digit',
    //         },
    //     },
    //     text: "Autosaved: "
    // },
    unorderedListStyle: "-",
    forceSync: true,
    // hideIcons: ["guide", "heading"],
    // indentWithTabs: false,
    insertTexts: {
        horizontalRule: ["", "\n\n-----\n\n"],
        image: ["![](http://", ")"],
        link: ["[", "](https://)"],
        table: [
            "",
            "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n",
        ],
    },
    lineWrapping: true,
    minHeight: "500px",
    parsingConfig: {
        allowAtxHeaderWithoutSpace: true,
        strikethrough: false,
        underscoresBreakWords: true,
    },
    placeholder: "Type here...",

    previewClass: "my-custom-styling",
    previewClass: ["my-custom-styling", "more-custom-styling"],

    previewRender: (plainText) => customMarkdownParser(plainText), // Returns HTML from a custom parser
    previewRender: (plainText, preview) => {
        // Async method
        setTimeout(() => {
            preview.innerHTML = customMarkdownParser(plainText);
        }, 250);

        // If you return null, the innerHTML of the preview will not
        // be overwritten. Useful if you control the preview node's content via
        // vdom diffing.
        // return null;

        return "Loading...";
    },
    promptURLs: true,
    promptTexts: {
        image: "Custom prompt for URL:",
        link: "Custom prompt for URL:",
    },
    renderingConfig: {
        singleLineBreaks: false,
        codeSyntaxHighlighting: true,
        sanitizerFunction: (renderedHTML) => {
            // Using DOMPurify and only allowing <b> tags
            return DOMPurify.sanitize(renderedHTML, {
                ALLOWED_TAGS: ["b"],
            });
        },
    },
    shortcuts: {
        drawTable: "Cmd-Alt-T",
    },
    showIcons: ["code", "table"],
    spellChecker: true,
    // status: true,
    // status: [], // Optional usage
    status: ["lines", "words", "cursor"], // Another optional usage, with a custom status bar item that counts keystrokes
    styleSelectedText: false,
    sideBySideFullscreen: false,
    syncSideBySidePreviewScroll: false,
    tabSize: 1,
    toolbar: [
        "bold",
        "italic",
        "heading",
        "|",
        "quote",
        "code",
        "upload-image",
        "clean-block",
        "fullscreen",
        "unordered-list",
        "link",
        "table",
        "horizontal-rule",
        "preview",
        "strikethrough",
        "guide",
        "side-by-side",
    ],
    uploadImage: true,
    toolbarTips: true,
    toolbarButtonClassPrefix: "mde",
    // previewImagesInEditor: true,
    imageUploadFunction: function (file, onSuccess, onError) {
        var form_data = new FormData();
        var imageUrl;
        form_data.append("file", file);
        form_data.append("_token", token);
        $.ajax({
            url: "http://personal.blog.local/" + "upload-image",
            data: form_data,
            dataType: "json",
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
                imageUrl = response.location;
            },
        }).then((url) => onSuccess(appendImageLink(imageUrl)));
    },
});

function appendImageLink(imageUrl) {
    const cursor = editor.codemirror.getCursor();
    const currentLine = editor.codemirror.getLine(cursor.line);
    const lineStart = cursor.ch - currentLine.length;
    const lineEnd = cursor.ch + (currentLine.length - lineStart);

    const lineText = currentLine.substring(lineStart, lineEnd);
    const lineIsEmpty = lineText.trim() === "";

    const prefixNewline = lineIsEmpty ? "" : "\n";
    const postfixNewline = lineIsEmpty ? "" : "\n";

    const imageMarkdown = `![](http://personal.blog.local${imageUrl})`;
    editor.codemirror.replaceSelection(
        `${prefixNewline}${imageMarkdown}${postfixNewline}`
    );
}
