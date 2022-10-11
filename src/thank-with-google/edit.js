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
			className="googlesitekit-twg-wrapper"
			style={ {
				display: 'flex',
				alignItems: 'center',
				flexWrap: 'wrap',
				gap: '0 10px'
			} }
		>
			<div
				counter-button="true"
				style={ {
					height: '34px',
					visibility: 'hidden',
					boxSizing: 'content-box',
					padding: '12px 0',
					display: 'inline-block',
					overflow: 'hidden'
				} }
			/>
			<button
				twg-button="true"
				style={ {
					height: '42px',
					visibility: 'hidden',
					margin: '12px 0'
				} }
			/>
		</div>
		
	);
}
