// const editor = new EditorJS({
//     holderId: 'editorJs',
//     tools: {
//         header: Header,
//         image: SimpleImage,
//         list: List,
//         embed: Embed,
//         linkTool: LinkTool,
//         checklist: Checklist,
//     },
// });
const homeBeheerImg = new EditorJS({
    holderId: 'homeBeheerImg',
    tools: {
        image: SimpleImage,
    },
});

const homeBeheerContent = new EditorJS({
    holderId: 'homeBeheerContent',
    tools: {
        header: Header,
        image: SimpleImage,
        list: List,
        embed: Embed,
        linkTool: LinkTool,
        checklist: Checklist,
    },
});
$('#saveBtn').on('click', function () {
    homeBeheerContent.save().then((outputData) => {
        console.log('Article data: ', outputData)
    });

    homeBeheerImg.save().then((outputData) => {
        console.log('Article data: ', outputData)
    });

    editor.save().then((outputData) => {
        console.log('Article data: ', outputData)
    }).catch((error) => {
        console.log('Saving failed: ', error)
    });
});
