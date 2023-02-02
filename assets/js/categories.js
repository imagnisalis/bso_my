import { Treeselect } from '../../node_modules/treeselectjs/dist/treeselectjs.mjs.js'

const categoriesOptions = [
    {
        name: 'Non-residential',
        value: 'Non-residential',
        children: [
            {
                name: 'Education',
                value: 'Education',
                children: []
            },
            {
                name: 'Health',
                value: 'Health',
                children: []
            },
            {
                name: 'Hotels and restaurants',
                value: 'Hotels and restaurant',
                children: []
            },
            {
                name: 'Office',
                value: 'Office',
                children: []
            },
            {
                name: 'Other',
                value: 'Other',
                children: []
            },
            {
                name: 'Wholesale and retail trade',
                value: 'Wholesale and retail trade',
                children: []
            }
        ]
    },
    {
        name: 'Residential',
        value: 'Residential',
        children: [
            {
                name: 'Apartment blocks',
                value: 'Apartment blocks',
                children: []
            },
            {
                name: 'N/A',
                value: 'N/A',
                children: []
            },
            {
                name: 'Single Family House',
                value: 'Single Family House',
                children: []
            }
        ]
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

