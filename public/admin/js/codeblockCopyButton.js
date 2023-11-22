document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("pre").forEach((codeBlock) => {
        const copyButton = document.createElement("span");
        copyButton.className = "copy-btn";
        copyButton.textContent = "Copy";

        copyButton.onclick = function () {
            const codeText = codeBlock.innerText;
            copyTextToClipboard(codeText);
        };

        codeBlock.insertBefore(copyButton, codeBlock.firstChild);
    });
});

function copyTextToClipboard(text) {
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard
            .writeText(text)
            .then(() => {
                alert("Code copied to clipboard!");
            })
            .catch((err) => {
                console.error("Failed to copy: ", err);
            });
    } else {
        // Fallback for browsers not supporting clipboard API
        const textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("copy");
        document.body.removeChild(textArea);
        alert("Code copied to clipboard (fallback method)!");
    }
}
