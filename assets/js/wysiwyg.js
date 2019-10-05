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

var newBeheerData = JSON.parse($('#contentBeheerData').text());

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
    data: newBeheerData
});

$('#saveBtn').on('click', function () {
    homeBeheerContent.save().then((outputData) => {
        axios.get('?request=updateData', {
            params: {
                page: 'Home',
                data: outputData
            }
        })
    });

    homeBeheerImg.save().then((outputData) => {
        console.log('Article data: ', outputData)
    });
});
