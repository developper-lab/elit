// Функция для смены изображений
const handleImageChange = (offset) => {
    const activeSlide = document.querySelector(".slide[data-active]");
    const slides = [...document.querySelectorAll(".slide")];
    const currentIndex = slides.indexOf(activeSlide);
    let newIndex = currentIndex + offset;

    if (newIndex < 0) newIndex = slides.length - 1;
    if (newIndex >= slides.length) newIndex = 0;

    // Удаляем атрибут data-active у текущего активного слайда
    activeSlide.removeAttribute("data-active");

    // Устанавливаем атрибут data-active на новый активный слайд
    slides[newIndex].setAttribute("data-active", "true");

    // Обновляем активную точку
    updateIndicators(newIndex);
}

// Обновление индикаторов
const updateIndicators = (activeIndex) => {
    const indicators = document.querySelectorAll(".carousel-indicators .indicator");
    indicators.forEach((indicator, index) => {
        indicator.classList.toggle("active", index === activeIndex);
    });
}

// Инициализация индикаторов
const initIndicators = () => {
    const slides = document.querySelectorAll(".slide");
    const indicatorsContainer = document.querySelector(".carousel-indicators");
    
    // Создаем индикаторы для каждого слайда
    slides.forEach((_, index) => {
        const indicator = document.createElement("div");
        indicator.classList.add("indicator");
        indicator.addEventListener("click", () => {
            handleImageChange(index - [...document.querySelectorAll(".slide[data-active]").length]);
        });
        indicatorsContainer.appendChild(indicator);
    });

    // Устанавливаем начальное состояние индикаторов
    const activeIndex = [...document.querySelectorAll(".slide")].findIndex(slide => slide.hasAttribute('data-active'));
    updateIndicators(activeIndex);
}

// Инициализация при загрузке
document.addEventListener("DOMContentLoaded", () => {
    initIndicators();
    
    // Запускаем автоматическую смену слайдов каждые 5 секунд
    setInterval(() => {
        handleImageChange(1);
    }, 10000); // 5000 миллисекунд = 5 секунд
});


// Обработчики кнопок
const onNext = () => handleImageChange(1);
const onPrev = () => handleImageChange(-1);
