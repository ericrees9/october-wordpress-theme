// console.log("nav scripts are in");

document.addEventListener("DOMContentLoaded", function () {
    const mainContent = document.getElementById("main-content");
    const navLinks = document.querySelectorAll("nav a");
    const homeLink = document.getElementById("home-link");
    const sidebar = document.getElementById("sidebar");
    const mobileMenuButton = document.getElementById("mobile_menu_checkbox");

    // Function to fetch page content asynchronously from the WordPress API
    async function fetchPageContent(slug, isHistoryPush = true) {
        try {
            let apiUrl = "/wp-json/wp/v2/pages";

            // If slug is provided, fetch that page; otherwise, load the homepage (adjust slug as needed)
            if (slug) {
                apiUrl += `?slug=${slug}`;
            } else {
                apiUrl += `?slug=homepage`;
            }

            const response = await fetch(apiUrl);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();

            if (data.length > 0) {
                mainContent.innerHTML = data[0].content.rendered;

                document.title = "Eric Rees" + (slug ? ` > ${data[0].title.rendered}` : "");

                Array.from(document.body.classList)
                    .filter(cls => cls.startsWith("page-"))
                    .forEach(cls => document.body.classList.remove(cls));
                // Add a new class based on the slug (or 'page-home' if slug is empty)
                document.body.classList.add(slug ? `page-${slug}` : "page-home");
                
                // Only update browser history if needed
                if (isHistoryPush) {
                    history.pushState({ slug }, "", slug ? `/${slug}` : "/");
                }

                // Update the "show" class on homeLink as needed
                if (homeLink) {
                    if (window.location.pathname === "/") {
                        homeLink.classList.remove("show");
                    } else {
                        homeLink.classList.add("show");
                    }
                }
            }
        } catch (error) {
            console.error("Error loading page:", error);
        }
    }

    // Determine the initial slug from the URL.
    // If the pathname is not "/" then extract the slug from it.
    let initialSlug = "";
    if (window.location.pathname !== "/") {
        // This assumes your URL structure is like "/some-slug"
        const parts = window.location.pathname.split("/").filter(Boolean);
        initialSlug = parts.pop();
    }

    // Instead of forcing the base URL, initialize the state from the URL
    history.replaceState({ slug: initialSlug }, "", window.location.pathname);

    // On initial load, fetch the page content based on the current slug.
    fetchPageContent(initialSlug, false);

    // Listen for popstate events (back/forward navigation)
    window.addEventListener("popstate", function (event) {
        // If state exists, load the corresponding page content without pushing a new state.
        if (event.state) {
            fetchPageContent(event.state.slug, false);
        }
    });

    // Handle navigation clicks for all nav links
    navLinks.forEach(link => {
        link.addEventListener("click", async function (event) {
            event.preventDefault();
            const url = this.getAttribute("href");
            const slug = url.split("/").filter(Boolean).pop(); // Extract slug from URL

            // If this is the home link, use an empty slug; otherwise, use the extracted slug
            if (this === homeLink) {
                await fetchPageContent("", true);
            } else {
                await fetchPageContent(slug, true);
            }
        });
    });

    // Handle back/forward navigation
    window.addEventListener("popstate", async function (event) {
        const slug = event.state ? event.state.slug : ""; // Extract slug from state
        await fetchPageContent(slug, false);
    });

    //Mutation Observer for Sidebar Opening and Closing
    if (!mobileMenuButton || !sidebar || !mainContent) {
        console.error("One or more required elements were not found.");
        return;
      }
  
      function syncCheckbox() {
        // mobileMenuButton.checked = sidebar.classList.contains("active");
        mobileMenuButton.checked = document.body.classList.contains("active");
      }
  
      function toggleMenu() {
        // sidebar.classList.toggle("active");
        document.body.classList.toggle("sidebar-active");
        mainContent.classList.toggle("darken");
        syncCheckbox();
      }
  
      mobileMenuButton.addEventListener("click", function () {
        toggleMenu();
      });
  
      mainContent.addEventListener("click", function () {
        if (document.body.classList.contains("sidebar-active")) {
          document.body.classList.remove("sidebar-active");
          mainContent.classList.remove("darken");
          syncCheckbox();
        }
      });
  
      const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
          if (mutation.type === "attributes" && mutation.attributeName === "class") {
            syncCheckbox();
          }
        });
      });
  
      observer.observe(sidebar, { attributes: true });

    // if( darkLightSlider ) {
    //     darkLightSlider.addEventListener("click", function () {
    //         if ( darkLightSlider.classList.contains("dark") ) {
    //             darkLightSlider.classList.remove("dark");
    //             darkLightSlider.classList.add("light");
    //             localStorage.setItem('theme', 'light');
    //         } else {
    //             darkLightSlider.classList.remove("light");
    //             darkLightSlider.classList.add("dark");
    //             localStorage.setItem('theme', 'dark');
    //         } 
    //     })
    // }
    // DARK/LIGHT TOGGLE SECTION
    const checkbox = document.querySelector('.toggle-switch input[type="checkbox"]');
    const darkLightSlider = document.getElementById('dl-slider');

    // Determine the stored theme (default to "dark" if not set)
    const storedTheme = localStorage.getItem('theme') || 'dark';

    if (storedTheme === 'light') {
        darkLightSlider.classList.remove('dark');
        darkLightSlider.classList.add('light');
        checkbox.checked = true;
        document.documentElement.setAttribute('data-theme', 'light');
    } else {
        darkLightSlider.classList.remove('light');
        darkLightSlider.classList.add('dark');
        checkbox.checked = false;
        document.documentElement.setAttribute('data-theme', 'dark');
    }

    checkbox.addEventListener('change', function () {
        if (checkbox.checked) {
          // Switch to light mode
          darkLightSlider.classList.remove('dark');
          darkLightSlider.classList.add('light');
          localStorage.setItem('theme', 'light');
          document.documentElement.setAttribute('data-theme', 'light');
        } else {
          // Switch to dark mode
          darkLightSlider.classList.remove('light');
          darkLightSlider.classList.add('dark');
          localStorage.setItem('theme', 'dark');
          document.documentElement.setAttribute('data-theme', 'dark');
        }
    });
});
