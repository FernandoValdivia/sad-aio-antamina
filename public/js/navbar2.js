var sections = document.querySelectorAll('section');
onscroll = function () {
    var scrollPosition = document.documentElement.scrollTop;

    sections.forEach( section => {
        if(scrollPosition + 210 >= section.offsetTop && scrollPosition < section.offsetTop + section.offsetHeight) {
            var currId = section.attributes.id.value;
            removeAllActiveClasses();
            addActiveCLass(currId)
        }
    })
}

var removeAllActiveClasses = function() {
    document.querySelectorAll("nav a").forEach( el => {
        el.classList.remove('actual');
    })
}

var addActiveCLass = function(id) {
    console.log(id);
    var selector = `nav a[href="#${id}"]`;
    document.querySelector(selector).classList.add('actual')
}