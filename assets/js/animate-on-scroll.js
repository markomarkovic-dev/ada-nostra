window.onload = () => {
    const waterfallItems = document.querySelectorAll('.animate-it');

    function isElementInViewport(el) {
      const rect = el.getBoundingClientRect();
      return (
        rect.top >= 50 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }
  
    function handleScroll() {
      waterfallItems.forEach((waterfallItem) => {
        if (isElementInViewport(waterfallItem)) {
          waterfallItem.classList.add('in-viewport');
        } else {
            if(waterfallItem.classList.contains('animation-loop')) {
                waterfallItem.classList.remove('in-viewport');
            }
        }
      });
    }
  
    handleScroll();
  
    window.addEventListener('scroll', handleScroll);
}