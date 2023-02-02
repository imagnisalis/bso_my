import { Treeselect } from '../../node_modules/treeselectjs/dist/treeselectjs.mjs.js'

const categoriesOptions = [
    {
        name: 'Residential',
        value: 'Residential',
        children: []
    },
    {
        name: 'Services',
        value: 'Services',
        children: []
    }
]

const domElement = document.querySelector('.treeselect-categories')
const treeselect = new Treeselect({
    parentHtmlContainer: domElement,
    value: [],
    options: categoriesOptions,
    grouped: false,
    placeholder: 'Select categories, subcategories...'
})