import { Treeselect } from '../../node_modules/treeselectjs/dist/treeselectjs.mjs.js'

const countriesOptions = [
    {
        name: 'All countries',
        value: 'All countries',
        children: [
            {
                name: 'Austria',
                value: 'Austria',
                children: []
            },
            {
                name: 'Belgium',
                value: 'Belgium',
                children: []
            },
            {
                name: 'Bulgaria',
                value: 'Bulgaria',
                children: []
            },
            {
                name: 'Croatia',
                value: 'Croatia',
                children: []
            },
            {
                name: 'Cyprus',
                value: 'Cyprus',
                children: []
            },
            {
                name: 'Czech Republic',
                value: 'Czech Republic',
                children: []
            },
            {
                name: 'Denmark',
                value: 'Denmark',
                children: []
            },
            {
                name: 'Estonia',
                value: 'Estonia',
                children: []
            },
            {
                name: 'Finland',
                value: 'Finland',
                children: []
            },
            {
                name: 'France',
                value: 'France',
                children: []
            },
            {
                name: 'Germany',
                value: 'Germany',
                children: []
            },
            {
                name: 'Greece',
                value: 'Greece',
                children: []
            },
            {
                name: 'Hungary',
                value: 'Hungary',
                children: []
            },
            {
                name: 'Ireland',
                value: 'Ireland',
                children: []
            },
            {
                name: 'Italy',
                value: 'Italy',
                children: []
            },
            {
                name: 'Latvia',
                value: 'Latvia',
                children: []
            },
            {
                name: 'Lithuania',
                value: 'Lithuania',
                children: []
            },
            {
                name: 'Luxembourg',
                value: 'Luxembourg',
                children: []
            },
            {
                name: 'Malta',
                value: 'Malta',
                children: []
            },
            {
                name: 'Netherlands',
                value: 'Netherlands',
                children: []
            },
            {
                name: 'Poland',
                value: 'Poland',
                children: []
            },
            {
                name: 'Portugal',
                value: 'Portugal',
                children: []
            },
            {
                name: 'Romania',
                value: 'Romania',
                children: []
            },
            {
                name: 'Slovakia',
                value: 'Slovakia',
                children: []
            },
            {
                name: 'Slovenia',
                value: 'Slovenia',
                children: []
            },
            {
                name: 'Spain',
                value: 'Spain',
                children: []
            },
            {
                name: 'Sweden',
                value: 'Sweden',
                children: []
            },
            {
                name: 'EU',
                value: 'EU',
                children: []
            }
        ]
    }
]


const domElement = document.querySelector('.treeselect-countries')
const treeselect = new Treeselect({
    parentHtmlContainer: domElement,
    value: [],
    options: countriesOptions,
    grouped: false,
    placeholder: 'Select countries',
    openLevel: 1
})
