/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save() {
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
