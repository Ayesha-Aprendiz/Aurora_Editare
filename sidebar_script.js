// JavaScript for interactivity
const menuItems = document.querySelectorAll('.menu-item');
const contentSections = document.querySelectorAll('.content-section');

menuItems.forEach(item => {
    item.addEventListener('click', () => {
        // Remove active class from all menu items
        menuItems.forEach(i => i.classList.remove('active'));
        // Hide all content sections
        contentSections.forEach(section => section.classList.remove('active'));
        
        // Set the clicked item as active
        // item.classList.add('active');
        // Get the target section ID and show it
        // const target = item.getAttribute('data-target');
        // console.log(item.getAttribute('data-target'));
        
        // target.forEach(i=> console.log(i));
        // target.forEach(i => i.classList.add('active'));
        item.classList.add('active');
        // document.querySelector(target).classList.add('active');
        // target.classList.add('active');
    });
});
