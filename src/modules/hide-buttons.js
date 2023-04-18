import { checkWhoOnlineID } from "./check-who-onlineID";
function hideButtons(button) {
    localStorage.setItem('personID', checkWhoOnlineID());

    let contentFamily = document.querySelector('.profile__services');
    let contentData = document.querySelector('.profile-data');
    let contentOccasion = document.querySelector('.profile__occasion');

    if (button.classList.contains('profile__services')) {
        contentFamily.classList.remove('hidden');
        contentData.classList.add('hidden');
        contentOccasion.classList.add('hidden');
    }
    if (button.classList.contains('profile__data')) {
        contentFamily.classList.add('hidden');
        contentData.classList.remove('hidden');
        contentOccasion.classList.add('hidden');
    }
    if (button.classList.contains('profile__occasion')) {
        contentFamily.classList.add('hidden');
        contentData.classList.add('hidden');
        contentOccasion.classList.remove('hidden');
    }
}

export { hideButtons }