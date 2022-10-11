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
