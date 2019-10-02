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

console.log();
/*const homeContent = new EditorJS({
    holderId: 'homeContent',

    data: {
        time: 1570008723203,
        blocks: [
            {
                type: "paragraph",
                data: {
                    text: "FUCKIN KANKER CODE"
                }
            }
        ],
        version: "2.15.1"
    }


});*/

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
