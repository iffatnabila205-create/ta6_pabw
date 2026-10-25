// ===== SLIDER =====
// Slider berjalan lewat animasi CSS (lihat beranda.css). Tombol prev/next hanya
// dipasang jika elemennya ada di halaman.
document.addEventListener('DOMContentLoaded', () => {
  const slideImages = document.querySelectorAll('.slides img');
  const total = slideImages.length;
  let index = 0;

  function showSlide(n) {
    index = (n + total) % total;
  }

  const next = document.getElementById('next');
  const prev = document.getElementById('prev');
  if (next) next.onclick = () => showSlide(index + 1);
  if (prev) prev.onclick = () => showSlide(index - 1);
  if (total) setInterval(() => showSlide(index + 1), 5000);

  // ===== FADE-IN SAAT SCROLL =====
  const fadeSections = document.querySelectorAll('.fade-section');
  window.addEventListener('scroll', () => {
    fadeSections.forEach(section => {
      const rect = section.getBoundingClientRect();
      if (rect.top < window.innerHeight - 100) {
        section.style.opacity = '1';
        section.style.transform = 'translateY(0)';
      }
    });
  });

  // ===== SCROLL TO TOP =====
  const toTop = document.getElementById('toTop');
  if (toTop) {
    window.addEventListener('scroll', () => {
      toTop.style.display = window.scrollY > 300 ? 'block' : 'none';
    });
    toTop.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });
  }
});

// ===== LOGOUT =====
function logout() {
  if (confirm('Logout dari akun TOUGAR?')) {
    document.getElementById('logout-form').submit();
  }
}
