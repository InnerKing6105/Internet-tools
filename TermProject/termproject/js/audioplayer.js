document.addEventListener("DOMContentLoaded", (event) => {
  const audio = document.getElementById("audio");
  const audioSource = document.getElementById("audio-source");
  const prevButton = document.getElementById("prev");
  const nextButton = document.getElementById("next");

  const playlist = ["../audio/1.mp3", "../audio/2.mp3", "../audio/3.mp3"];

  let currentSongIndex = 0;

  const loadSong = (index) => {
    audioSource.src = playlist[index];
    audio.load();
    audio.play();
  };

  prevButton.addEventListener("click", () => {
    currentSongIndex =
      currentSongIndex > 0 ? currentSongIndex - 1 : playlist.length - 1;
    loadSong(currentSongIndex);
  });

  nextButton.addEventListener("click", () => {
    currentSongIndex =
      currentSongIndex < playlist.length - 1 ? currentSongIndex + 1 : 0;
    loadSong(currentSongIndex);
  });

  audio.addEventListener("ended", () => {
    nextButton.click();
  });

  loadSong(currentSongIndex);
});
