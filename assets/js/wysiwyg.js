const editor = new EditorJS({
    holderId: 'editorJs',
    tools: {
        header: Header,
        list: List,
        embed: Embed,
        linkTool: LinkTool,
        checklist: Checklist,
        image: SimpleImage,
    },
});


$('#saveBtn').on('click', function () {
    editor.save().then((outputData) => {
        console.log('Article data: ', outputData)
    }).catch((error) => {
        console.log('Saving failed: ', error)
    });
});
