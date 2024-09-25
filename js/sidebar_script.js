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
        item.classList.add('active');
        // Get the target section ID and show it
        const target = item.getAttribute('data-target');
        document.getElementById(target).classList.add('active');
    });
});
