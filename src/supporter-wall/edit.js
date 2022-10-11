/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit() {
	return (
		<div
			twg-thank-wall="true"
			style={ {
				width: '100%',
				height: '490px',
				minHeight: '150px',
				overflow: 'hidden',
				border: '1px solid #e3e3e3',
				borderRadius: '15px',
				margin: '20px 0'
			} }
		/>
	);
}
