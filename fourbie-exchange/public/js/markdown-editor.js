document.addEventListener("DOMContentLoaded", function() {
    // Wait for DOM content to be fully loaded
    // Load marked library dynamically
    var script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/marked/marked.min.js';
    script.onload = function () {
        // Initialize preview on page load
        updatePreview();

        // Update preview whenever editor content changes
        document.getElementById('description').addEventListener('input', updatePreview);
    };
    document.head.appendChild(script);
});

function insertMarkdown(prefix, suffix) {
    var textarea = document.getElementById('description');
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var selectedText = textarea.value.substring(start, end);

    // Check if there is a list item at the current line
    var lines = textarea.value.split('\n');
    var currentLine = lines[start].trim();
    var isListItem = currentLine.startsWith('- ');

    // Determine the replacement text based on whether it's a list item or not
    var replacement = '';
    if (isListItem) {
        // Append the selected text as a new list item
        replacement = currentLine + '\n- ' + selectedText;
    } else {
        // Start a new list item with the selected text
        replacement = '- ' + selectedText;
    }

    // Update the textarea value with the replacement text
    textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);

    // Move the cursor to the end of the inserted text
    var newCursorPosition = start + replacement.length;
    textarea.setSelectionRange(newCursorPosition, newCursorPosition);
    textarea.focus();

    updatePreview();
}

function updatePreview() {
    var textarea = document.getElementById('description');
    var previewDiv = document.getElementById('previewContent');
    previewDiv.innerHTML = marked.parse(textarea.value);
}