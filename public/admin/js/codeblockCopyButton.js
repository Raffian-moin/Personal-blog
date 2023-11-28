document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("pre").forEach((codeBlock, index) => {
        const copyButton = document.createElement("span");
        copyButton.id = `copy_button-${index}`;
        copyButton.className = "copy-btn";
        copyButton.textContent = "Copy";

        copyButton.onclick = function (event) {
            const clickedButtonId = event.target.id;
            const codeText = codeBlock.innerText;
            copyTextToClipboard(codeText, clickedButtonId);
        };

        codeBlock.insertBefore(copyButton, codeBlock.firstChild);
    });
});

function copyTextToClipboard(codeText, clickedButtonId) {
    // Check if the codeText contains the "Copy" message
    const copiedMessage = "Copy";
    const isCopied = codeText.includes(copiedMessage);

    // If the "Copied" message is found, exclude it from the copied codeText
    const textToCopy = isCopied ? codeText.replace(copiedMessage, "") : codeText;

    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard
            .writeText(textToCopy)
            .then(() => {
                changeTextToCopied(clickedButtonId);
            })
            .catch((err) => {
                console.error("Failed to copy: ", err);
            });
    } else {
        // Fallback for browsers not supporting clipboard API
        const textArea = document.createElement("textarea");
        textArea.value = textToCopy;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("copy");
        document.body.removeChild(textArea);
        changeTextToCopied(clickedButtonId);
    }
}

function changeTextToCopied(clickedButtonId) {
    let clickedCopyButton = document.getElementById(clickedButtonId);
    clickedCopyButton.innerHTML = 'Copied';
    setTimeout(() => {
        clickedCopyButton.innerHTML = "Copy";
    }, 1000);
}
