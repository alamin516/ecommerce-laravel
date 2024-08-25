 // Alert
 function confirmation(event, message) {
    event.preventDefault();

    let url = ''
    if (event.currentTarget.getAttribute('href')) {
        url = event.currentTarget.getAttribute('href')
    }
    console.log(url)

    Swal.fire({
        title: 'Are you sure?',
        text: message || "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

// Product upload image preview
function previewImage(event) {
    const input = event.target;
    const file = input.files[0];
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('placeholder');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
        }

        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
        placeholder.style.display = 'block';
    }
}

// Product update image preview
function previewProductImage(event) {
    const imagePreview = document.getElementById('productImagePreview');
    const placeholder = document.getElementById('productPlaceholder');
    imagePreview.style.display = 'block';
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
    if (placeholder) {
        placeholder.style.display = 'none';
    }

    function updatePublished(checkbox) {
        // Get the value of the checkbox
        const value = checkbox.value;
        // Check if the checkbox is checked
        const isChecked = checkbox.checked;

        // Perform any action you need, e.g., send an AJAX request or update the UI
        console.log(`Checkbox value: ${value}, Checked: ${isChecked}`);
    }
}


// update product status
function updatePublished(checkbox, id) {
    // Get the value of the checkbox
    const value = checkbox.value;
    // Check if the checkbox is checked
    const isChecked = checkbox.checked;

    // Perform any action you need, e.g., send an AJAX request or update the UI
    console.log(`Checkbox value: ${value}, Checked: ${isChecked}`);
}

