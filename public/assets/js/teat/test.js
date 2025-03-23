function getRecord(data) {
    $('#section_name_ar').val(data.name_ar || '');
    $('#section_name_en').val(data.name_en || '');
    $('#section_id').val(data.id || '');
    $('#parent_id').val(data.parent_id || ''); // Set parent_id value in the dropdown
}