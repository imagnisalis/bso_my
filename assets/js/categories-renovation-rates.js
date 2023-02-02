import { Treeselect } from '../../node_modules/treeselectjs/dist/treeselectjs.mjs.js'

const categoriesOptions = [
    {
        name: 'Non-residential',
        value: 'Non-residential',
        children: []
    },
    {
        name: 'Residential',
        value: 'Residential',
        children: []
    },
    {
        name: 'Whole building stock',
        value: 'Whole building stock',
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
