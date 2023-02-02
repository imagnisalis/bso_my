import { Treeselect } from '../../node_modules/treeselectjs/dist/treeselectjs.mjs.js'

const yearsOptions = [
    {
        name: 'All years',
        value: 'Επιλογή όλων',
        children: [
            {
                name: '2012',
                value: '2012',
                children: []
            },
            {
                name: '2013',
                value: '2013',
                children: []
            },
            {
                name: '2014',
                value: '2014',
                children: []
            },
            {
                name: '2015',
                value: '2015',
                children: []
            },
            {
                name: '2016',
                value: '2016',
                children: []
            }
        ]
    }
]

const slot = document.createElement('div')


const domElement = document.querySelector('.treeselect-years')

const treeselect = new Treeselect({
    parentHtmlContainer: domElement,
    value: [],
    options: yearsOptions,
    listSlotHtmlComponent: slot,
    grouped: false,
    placeholder: 'Select years',
    openLevel: 1,
    //alwaysOpen: true
})

//let lastChecked = null;

//let checkboxes = slot.parentElement.offsetParent.childNodes[0].childNodes

treeselect.srcElement.addEventListener('input', (e) => {
    console.log('Selected value:', e.detail);
})


