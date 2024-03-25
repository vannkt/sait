const offers = [
    {
      title: "Falken Eurowinter HS02T91 195/65 R15",
      image: "img/portfolio/1.jpg",
      category: "Леки автомобили",
      season: "Зимни",
      size: "195/65 R15",
      loadIndex: 91,
      speedIndex: "T",
      model: "Eurowinter HS02",
      oldPrice: 156.00,
      newPrice: 104.99,
      labelImage: "img/portfolio/Label1.svg",
      title: "Michelin Pilot Sport PS4S",
      image: "img/portfolio/2.jpg",
      category: "Спортни гуми",
      season: "Летни",
      size: "225/45 R17",
      loadIndex: 94,
      speedIndex: "Y",
      model: "Pilot Sport PS4S",
      oldPrice: 220.00,
      newPrice: 179.99,
      labelImage: "img/portfolio/Label2.svg"
    },
    // Add more offers as needed
  ];
  document.addEventListener("DOMContentLoaded", function () {
    const modalContainer = document.getElementById("portfolioModalContainer");
    const portfolioSection = document.getElementById("portfolio");
  
    // Function to create modal content
    function createModalContent(offer) {
      return `
        <div class="portfolio-modal modal fade" id="${offer.id}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                <div class="rl"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                  <div class="modal-body">
                    <h2>${offer.title}</h2>
                    <img src="${offer.image}" class="img-responsive img-centered" alt="">
                    <p>Категория: ${offer.category}</p>
                    <p>Сезон: ${offer.season}</p>
                    <p>Размер: ${offer.size}</p>
                    <p>Теглови индекс: ${offer.loadIndex}</p>
                    <p>Скоростен индекс: ${offer.speedIndex}</p>
                    <p>Модел: ${offer.model}</p>
                    <p class="price-row">
                      Промоционална цена: <span class="old-price">${offer.oldPrice}</span> <span class="new-price">${offer.newPrice}</span> лв.
                    </p>
                    <img src="${offer.labelImage}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>`;
    }
  
    // Function to update portfolio section
    function updatePortfolioSection() {
      const portfolioItems = offers.map((offer, index) => `
        <div class="col-sm-6 col-md-4 portfolio-item">
          <a href="#portfolioModal${index + 1}" class="portfolio-link" data-toggle="modal">
            <div class="caption">
              <div class="caption-content">
                <i class="glyphicon glyphicon-zoom-in"></i>
              </div>
            </div>
            <img src="${offer.image}" class="img-responsive" alt="">
          </a>
        </div>`);
  
      portfolioSection.innerHTML = portfolioItems.join("");
    }
  
    // Initialize modals and portfolio section
    offers.forEach((offer, index) => {
      modalContainer.innerHTML += createModalContent(offer);
    });
  
    updatePortfolioSection();
  });
  