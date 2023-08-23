const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const app = {
    evenHandler () {
        // handle respone navbar
        const openBtn = $('.open__btn')
        const closeBtn = $('.close__btn')
        const navBar = $('.respon__nav')
        const overlay = $('.respon__overlay')
        if (openBtn && closeBtn && navBar && overlay) {
            openBtn.addEventListener('click', () => {
                navBar.style.transform = 'translateX(0)'
                navBar.style.opacity = 1
                overlay.style.opacity = 1
                overlay.style.visibility = 'visible'
            })
            closeBtn.addEventListener('click', () => {
                navBar.style.transform = 'translateX(100%)'
                navBar.style.opacity = 0
                overlay.style.opacity = 0
                overlay.style.visibility = 'hidden'
            })
            overlay.addEventListener('click', () => {
                navBar.style.transform = 'translateX(100%)'
                navBar.style.opacity = 0
                overlay.style.opacity = 0
                overlay.style.visibility = 'hidden'
            })
        }

        // search bar
        const toggleSearch = $('.toggle-searchbar')
        const searchFormWrapper = $('.search__form__wrapper')
        if (searchFormWrapper) {
            const searchForm = searchFormWrapper.querySelector('.search__form');
        }
        if (toggleSearch) {
            toggleSearch.addEventListener('click', e => {
                e.preventDefault();
                searchFormWrapper.classList.toggle('active');
            })
        }
        
        // product tabs
        const tabContainers = $$('.tab__container')
        tabContainers.forEach(item => {
            item.addEventListener('mouseenter', () => {
                item.classList.add('active')
                const activeContainer = $('.tab__container.active')
                if (activeContainer) {
                    const activeTabItems = $$('.tab__container.active > .tabs > .tab__item')
                    const activeTabLine = activeContainer.querySelector('.tab__line')
                    const activePanels = activeContainer.querySelectorAll('.panel__item')
                    activeTabItems.forEach((tab, index) => {
                        tab.onclick = () => {
                            activeContainer.querySelector('.panel__item.active').classList.remove('active')

                            tab.classList.add('active')
                            activePanels[index].classList.add('active')
                            activeTabLine.style.top = `${tab.offsetTop + tab.offsetHeight}px`
                            activeTabLine.style.left = `${tab.offsetLeft}px`
                            activeTabLine.style.width = `${tab.offsetWidth}px`
                        }
                    });
                }
            })
            item.addEventListener('mouseleave', () => {
                item.classList.remove('active')
            })
        });

        // header onscroll 
        const heroBanner = $('.hero-banner') 
        const header = $('.header')
        if (heroBanner) {
            header.classList.add('home-page');
            const offsetHeight = heroBanner.offsetHeight;
            document.addEventListener('scroll', () => {
                const scrollY = document.scrollY || document.documentElement.scrollTop
                if (scrollY !== 0) {
                    header.style.transform = 'translateY(-100%)';
                } else {
                    header.style.transform = 'translateY(0)';
                }
                if (scrollY > offsetHeight - header.offsetHeight) {
                    header.classList.add('scrolled');
                    header.style.transform = 'translateY(0)';
                } else {
                    header.classList.remove('scrolled');
                } 
            })
        }

        // slider
        const prevBtn = $('.prev__btn')
        const nextBtn = $('.next__btn')
        const sliderItem = $$('.slider__item')
        const sliderMain = $('.slider__main')
        if (sliderMain) {
            let itemWidth = sliderMain.offsetWidth
            var firstItem = sliderMain.firstElementChild.cloneNode(true);
            var lastItem = sliderMain.lastElementChild.cloneNode(true);

            // Append the cloned items to the beginning and end of the carousel
            sliderMain.appendChild(firstItem);
            sliderMain.insertBefore(lastItem, sliderMain.firstElementChild);

            // Initialize the current position of the carousel
            var currentPosition = -itemWidth;
            sliderMain.style.transform = `translateX(${currentPosition}px)`;
            nextBtn.onclick = () => {
                // Move to the next item
                currentPosition -= itemWidth;
                // Restrict the position to prevent scrolling beyond the last item
                currentPosition = Math.max(currentPosition, -itemWidth * (sliderMain.children.length - 1));
                // Apply the new position to the items container
                sliderMain.style.transform = `translateX(${currentPosition}px)`;
                // Check if we've reached the cloned last item
                if (currentPosition === -(itemWidth * (sliderMain.children.length - 1))) {
                    // Move to the actual first item
                    currentPosition = -itemWidth;
                    // Apply the new position instantly without animation
                    sliderMain.style.transition = 'none';
                    sliderMain.style.transform = `translateX(${currentPosition}px)`;

                    // After a short delay, reset the transition to re-enable animation
                    setTimeout(function () {
                        sliderMain.style.transition = '';
                    }, 10);
                }
            }
            prevBtn.addEventListener('click', () => {
                // Move to the previous item
                currentPosition += itemWidth;
                // Restrict the position to prevent scrolling beyond the first item
                currentPosition = Math.min(currentPosition, 0);
                // Apply the new position to the items container
                sliderMain.style.transform = `translateX(${currentPosition}px)`;

                // Check if we've reached the cloned first item
                if (currentPosition === 0) {
                    // Move to the actual last item
                    currentPosition = -itemWidth * (sliderMain.children.length - 2);
                    // Apply the new position instantly without animation
                    sliderMain.style.transition = 'none';
                    sliderMain.style.transform = `translateX(${currentPosition}px)`;

                    // After a short delay, reset the transition to re-enable animation
                    setTimeout(function () {
                        sliderMain.style.transition = '';
                    }, 10);
                }
            });
        }

        // select box handler
        const toggleSelect = $$('.toggle__select')
        const optionList = $$('.select-option__list')
        const selectOption = $$('.select__option:is(:not(.select__option.toggle__select))')

        // khi bấm vào toggle__select , optionList sẽ sổ xuống 
        // khi bấm vào option nào , thì option đó trở thành active , innerText của option đó chuyển lên toggleSelect
        // Khi bấm ra ngoài , optionList thu lại
        if (toggleSelect) {
            for (let i = 0; i < toggleSelect.length; i++) {
                optionList[i].style.display = 'none';
                this.eventSlideHandler('click', toggleSelect[i], optionList[i], 500);
            }
        }

        selectOption.forEach(item => {
            item.onclick = () => {
                // remove the option which selected before
                item.parentElement.querySelector('.select__option.selected').classList.remove('selected');
                // add the selected class to the select option
                item.classList.add('selected');
                // khi bấm vào select option , phải nhận biết được thẻ cha của option
                item.parentElement.parentElement.querySelector('.toggle__select').querySelector('span').innerText = item.innerText;
                const dropdown = item.parentElement
                this.slideToggle(dropdown, 500);
            }
        });

        // || product gallery start
        const galleryMain = $('.gallery__main > img')
        const galleryItems = $$('.gallery__item > img')
        if (galleryMain) {
            galleryItems.forEach(item => {
                item.onclick = () => {
                    galleryMain.style.animation = 'galleryEffect 2s cubic-bezier(0.19, 1, 0.22, 1) 1'
                    const itemSrc = item.getAttribute('src')
                    galleryMain.src = itemSrc
                    setTimeout(() => {
                        galleryMain.style.animation = ''
                    }, 500)
                }
            });
        }
        // || product gallery end


        // || quantity input start
        const [...qtyInput] = $$('.qty__input')
        if (qtyInput) {
            qtyInput.forEach((input, index) => {
                const minusBtn = input.parentElement.querySelector('.minus__btn')
                const plusBtn = input.parentElement.querySelector('.plus__btn')
                const subTotal = minusBtn.parentElement.parentElement.querySelector('.cart__product__subtotal')
                const [...cartProduct] = $$('.cart__product')
                minusBtn.onclick = e => {
                    e.preventDefault()
                    input.value < 1 ? input.value = 0 : input.value--
                    subTotal.innerText = `$${input.value * Number(subTotal.parentElement.parentElement.querySelector('.cart__product__price').innerText.split('').slice(1).join(''))}`
                    this.calculatorCheck(cartProduct, input, index)
                }
                plusBtn.onclick = e => {
                    e.preventDefault()
                    input.value++
                    subTotal.innerText = `$${input.value * Number(subTotal.parentElement.parentElement.querySelector('.cart__product__price').innerText.split('').slice(1).join(''))}`
                    this.calculatorCheck(cartProduct, input, index)
                }
                input.oninput = () => {
                    this.calculatorCheck(cartProduct, input, index)
                }
            });
        }
        // || quantity input end

        

        // || cart navigation respon handler start
        const toggleDropdown = $('.toggle-dropdown');
        const cartNavRespon = $('.cart-nav__respon');
        if (cartNavRespon) {
            cartNavRespon.style.display = 'none';
            this.eventSlideHandler('click', toggleDropdown, cartNavRespon, 500);
        }
        // || cart navigation respon handler end


        // || shipping options choosing handler start
        const shippingOptions = $$('.shipping__option')
        this.choosingOption(shippingOptions, '.shipping__option')
        // || shipping options choosing handler end


        //|| payment method choosing handler start
        const paymentMethods = $$('.payment-method')
        this.choosingOption(paymentMethods, '.payment-method')
        // toggle payment method form
        paymentMethods.forEach(item => {
            const paymentMethodForm = item.querySelector('.payment-method-info__form');
            if (paymentMethodForm) {
                paymentMethodForm.style.display = 'none';
                paymentMethodForm.addEventListener('click' , e => {
                    e.stopPropagation();
                })
                this.eventSlideHandler('click' , item , paymentMethodForm , 500);   
            }
        });
        //|| payment method choosing handler end



        // || toggle summary detail handler start
        const toggleSummary = $('.toggle-detail');
        const summaryDetail = $('.cart-summary__detail');
        const screenWidth = window.innerWidth;
        if (summaryDetail) {
            if (screenWidth <= 768) {
                toggleSummary.style.display = 'block';
                this.eventSlideHandler('click' , toggleSummary , summaryDetail , 500)
            } else {
                toggleSummary.style.display = 'none';
            }
        }
        // || toggle summary detail handler end


        // || toggle filter handler start
        const toggleFilter = $('.toggle-filter');
        const filterList = $('.filter__list');
        if (filterList) {
            filterList.style.display = 'none';
            this.eventSlideHandler('click' , toggleFilter , filterList);
        }
        // || toggle filter handler end


        // || admin header toggle searchbar start
        const toggleAdminSubnav = $('.toggle-admin-subnav')
        const adminSubnav = $('.admin__subnav')
        if (toggleAdminSubnav) {
            toggleAdminSubnav.addEventListener('click', e => {
                e.preventDefault();
                adminSubnav.classList.toggle('active');
            })
        }
        // || admin header toggle searchbar end


        // || toggle admin sidebar start
        const toggleSidebar = $('.sidebar__toggle')
        const adminSidebar = $('.admin__sidebar')
        if (toggleSidebar) {
            toggleSidebar.addEventListener('click', e => {
                adminSidebar.classList.toggle('admin__sidebar--mini')
            })
        }
        // || toggle admin sidebar end
        
        
        // || user detail nav start
        const toggleUser = $('.detail__icon')
        const userNav = $('.customer-detail__nav')
        if (toggleUser) {
            toggleUser.addEventListener('click', e => {
                e.preventDefault();
                userNav.classList.toggle('active')
                console.log(userNav.clientX , userNav.clientY)
            })
        }
        // || user detail nav start


        // || user detail nav start
        const toggleProduct = $('.more__btn')
        const productDetailNav = $('.product-function__mininav')
        if (toggleProduct) {
            toggleProduct.addEventListener('click', e => {
                e.preventDefault();
                productDetailNav.classList.toggle('active')
                console.log(productDetailNav.clientX , productDetailNav.clientY)
            })
        }
        // || user detail nav start


        // || rotate button start
        
        // || rotate button end
    },
    eventSlideHandler(event, toggle, element, duration) {
        if (toggle) {
            toggle.addEventListener(event, (e) => {
                // e.preventDefault();
                this.slideToggle(element, duration)
            })
        }
    },
    slideToggle(element, duration = 500) {
        if (window.getComputedStyle(element).display === 'none') {
            element.style.removeProperty('display');
            let height = element.scrollHeight;
            element.style.overflow = 'hidden';
            element.style.height = 0;
            element.style.transitionProperty = 'height';
            element.style.transitionDuration = duration + 'ms';
            element.offsetHeight; // Trigger reflow
            element.style.height = height + 'px';

            setTimeout(function () {
                element.style.removeProperty('height');
                element.style.removeProperty('overflow');
                element.style.removeProperty('transition-duration');
                element.style.removeProperty('transition-property');
            }, duration - 100);
        } else {
            element.style.overflow = 'hidden';
            element.style.height = element.offsetHeight + 'px';
            element.style.transitionProperty = 'height';
            element.style.transitionDuration = duration + 'ms';
            element.offsetHeight; // Trigger reflow
            element.style.height = 0;

            setTimeout(function () {
                element.style.display = 'none';
                element.style.removeProperty('height');
                element.style.removeProperty('overflow');
                element.style.removeProperty('transition-duration');
                element.style.removeProperty('transition-property');
            }, duration - 200);
        }
    },
    slideUp(element, duration = 500) {
        element.style.overflow = 'hidden';
        element.style.height = element.offsetHeight + 'px';
        element.style.transitionProperty = 'height, margin, padding';
        element.style.transitionDuration = duration + 'ms';
        element.offsetHeight; // Trigger reflow
        element.style.height = 0;
        element.style.marginTop = 0;
        element.style.marginBottom = 0;
        element.style.paddingTop = 0;
        element.style.paddingBottom = 0;
        element.style.opacity = 0;

        setTimeout(function () {
            element.style.display = 'none';
        }, duration);
    },
    slideDown(element, duration = 500) {
        element.style.removeProperty('display');
        let display = window.getComputedStyle(element).display;
        if (display === 'none') display = 'block';
        element.style.display = display;

        let height = element.offsetHeight;
        element.style.overflow = 'hidden';
        element.style.height = 0;
        element.style.transitionProperty = 'height, margin, padding';
        element.style.transitionDuration = duration + 'ms';
        element.offsetHeight; // Trigger reflow
        element.style.height = height + 'px';
        element.style.marginTop = '';
        element.style.marginBottom = '';
        element.style.paddingTop = '';
        element.style.paddingBottom = '';
        element.style.opacity = 1;

        setTimeout(function () {
            element.style.removeProperty('height');
            element.style.removeProperty('overflow');
            element.style.removeProperty('transition-duration');
            element.style.removeProperty('transition-property');
        }, duration);
    },   
    choosingOption(options, optionSelector) {
        options.forEach(item => {
            item.onclick = () => {
                $(`${optionSelector}.active`).classList.remove('active')

                item.classList.toggle('active')
            }
        })
    },
    renderActiveTabs() {
        const tabLines = $$('.tab__line')
        const renderActiveTabs = $$('.tab__item.active')
        for (let i = 0; i < renderActiveTabs.length; i++) {
            tabLines[i].style.width = `${renderActiveTabs[i].offsetWidth}px`
            tabLines[i].style.left = `${renderActiveTabs[i].offsetLeft}px`
            tabLines[i].style.top = `${renderActiveTabs[i].offsetTop + renderActiveTabs[i].offsetHeight}px`
        }
    },
    start() {
        // render active tab
        this.renderActiveTabs();
        // start app
        this.evenHandler();
    }
}
window.addEventListener('load' , () => {
    app.start();
})