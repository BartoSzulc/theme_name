const tabs = async function () {
    
  $(document).ready(function() {
    function addActiveTab($tabHeader, sectionClass) {
      const tabData = $tabHeader.data("tab");
      const $tabContent = $(`.${sectionClass} .tab-content[data-tab='${tabData}']`);
  
      // Only add "active" class and fade in if it's not already active
      if (!$tabHeader.hasClass("active")) {
        removeActiveClasses(sectionClass, function() {
          $tabHeader.addClass("active");
          $tabContent.addClass("active").fadeIn(400, function() {
            console.log(`Added active classes to tab with ID '${tabData}'`);
          });
        });
      }
    }
  
    function removeActiveClasses(sectionClass, callback) {
      $(`.${sectionClass} .tab-header`).removeClass("active");
      console.log("Removed active classes header.");
      $(`.${sectionClass} .tab-content.active`).fadeOut(300, function() {
        $(this).removeClass("active");
        console.log("Removed active classes content.");
        if (typeof callback === "function") {
          callback();
        }
      });
    }
  
    function initializeTabs(sectionClass, activeTab) {
      const $tabHeaders = $(`.${sectionClass} .tab-header`);
      const $tabContents = $(`.${sectionClass} .tab-content`);
  
      $tabContents.hide();
      $tabHeaders.removeClass("active");
  
      if (activeTab) {
        addActiveTab(activeTab, sectionClass);
      } else {
        const $firstTab = $tabHeaders.first();
        addActiveTab($firstTab, sectionClass);
      }
      $tabHeaders.on("click", function() {
        const tab = $(this).data("tab");
        const $activeTabContent = $(`.${sectionClass} .tab-content.active`);
  
        if (!$(this).hasClass("active")) {
          $activeTabContent.fadeOut(300, () => {
            removeActiveClasses(sectionClass);
            $(this).addClass("active");
            $(`.${sectionClass} .tab-content[data-tab='${tab}']`).fadeIn(300).addClass("active");
          });
        } else {
          console.log(`Tab with ID '${tab}' is already active.`);
        }
      });
    }
  
    function scrollToTabAndOpen(tabId) {
      const $tabHeader = $(`.tab-header[data-tab='${tabId}']`);
    
      // Check if the tab-header element exists
      if ($tabHeader.length === 0) {
        console.warn(`Tab with ID '${tabId}' not found. Redirecting to /oferta/#${tabId}`);
        window.location.href = `/oferta/#${tabId}`;
        return;
      }
    
      const sectionClass = $tabHeader.closest(".offer__tabs").attr("class");
    
      if (sectionClass) {
        const sectionClassArr = sectionClass.split(" ");
        const targetSectionClass = sectionClassArr.find((cls) => cls.startsWith("offer__tabs--"));
    
        if (targetSectionClass) {
          addActiveTab($tabHeader, targetSectionClass);
          $("html, body").animate(
            
            {
              scrollTop: $tabHeader.offset().top - 50,
            },
            500,
            () => {
              
            }
          );
        } else {
          console.warn(`No section class found for tab with ID '${tabId}'.`);
        }
      } else {
        console.warn(`No section class found for tab with ID '${tabId}'.`);
      }
    }
  
    initializeTabs("offer__tabs--premium");
    initializeTabs("offer__tabs--special");
    // Add more sections here with their respective classes if needed
  
    $(".menu-item__third-level a").on("click", function(e) {
      e.preventDefault();
      const targetId = $(this).attr("href").split("#")[1];
      console.log(`Menu link clicked. Scrolling to tab with ID '${targetId}'`);
      scrollToTabAndOpen(targetId);
    });
  
    function scrollToTab(tabId) {
      const $tabHeader = $(`.tab-header[data-tab='${tabId}']`);
    
      // Check if the tab-header element exists and scroll to it
      if ($tabHeader.length !== 0) {
        const sectionClass = $tabHeader.closest(".offer__tabs").attr("class");
    
        if (sectionClass) {
          const sectionClassArr = sectionClass.split(" ");
          const targetSectionClass = sectionClassArr.find((cls) => cls.startsWith("offer__tabs--"));
    
          if (targetSectionClass) {
            addActiveTab($tabHeader, targetSectionClass);
            $("html, body").animate(
              {
                scrollTop: $tabHeader.offset().top - 50,
              },
              500
            );
          } else {
            console.warn(`No section class found for tab with ID '${tabId}'.`);
          }
        } else {
          console.warn(`No section class found for tab with ID '${tabId}'.`);
        }
      }
    }
  
    // Check if the URL has a tab ID, then scroll to it
    const hash = window.location.hash.substr(1);
    if (hash) {
      scrollToTab(hash);
    }
  });
}

export const init = tabs;
