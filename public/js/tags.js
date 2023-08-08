let tagsItems = document.querySelectorAll('.tags_items');
var tags = document.getElementById('tags');
let tagsValue = [];

// loop through tags_items
tagsItems.forEach(t => {
    t.addEventListener('change', e => {
        if (e.target.checked) {
            tagsValue.push(e.target.value);
            //console.log('you checked item :  ' + e.target.value);
        } else {
            let i = tagsValue.indexOf(e.target.value);
            //console.log('you unchecked : ' + e.target.value);
            if (i > -1) {
                tagsValue.splice(i, 1);
            }
        }
        tags.value = tagsValue.join(",");
        console.log(tags.value);
    })
})
