const { registerBlockType } = wp.blocks;
const { useBlockProps } = wp.blockEditor;

registerBlockType('october/resume-block', {
    title: 'Resume Block',
    icon: 'admin-users',
    category: 'widgets',
    edit: () => {
        return (
            <div {...useBlockProps()}>
                <p>Edit Mode: Resume Block</p>
            </div>
        );
    },
    save: () => {
        return null; // Using PHP render_callback
    }
});