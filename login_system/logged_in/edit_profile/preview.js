
document.getElementById('imageFile').addEventListener('change', function preview(event) {
	const previewContainer = document.getElementById('previewContainer');
	previewContainer.innerHTML = ''; // Clear previous previews
	Array.from(event.target.files).forEach(file => {
		const reader = new FileReader();
		reader.onload = function(e) {
			const img = document.createElement('img');
			img.src = e.target.result;
			img.alt = file.name;
			img.classList.add('preview-image');
			previewContainer.appendChild(img);
		};
		reader.readAsDataURL(file);
	});
});