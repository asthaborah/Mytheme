import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

registerBlockType('Cornus-blocks/heading' , {
    title: __('Heading with Icon' , 'Cornus'),
    icon: 'admin-customizer',
    // description: __('Add heading and select icon' , 'Cornus'),
    category: 'Cornus',
    edit(){
        return <div>Hello World, step 1(from the editor)</div>
    },

    save(){
        return <div>Hello World, step 1(from the frontend)</div>
    },
});