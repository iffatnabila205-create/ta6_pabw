// ===== DATA STORAGE (Simulasi Database) =====
let dataDestinasi = [
  {
    id: 1,
    nama: "Kolam Renang Cipanas",
    deskripsi: "Pemandian air panas lengkap dengan kolam, hotel, dan wahana.",
    gambar: IMG_BASE + "cipanas.webp"
  },
  {
    id: 2,
    nama: "Situ Bagendit",
    deskripsi: "Danau wisata alam unggulan dengan legenda rakyat.",
    gambar: IMG_BASE + "situ-bagendit.jpg"
  },
  {
    id: 3,
    nama: "Pantai Santolo",
    deskripsi: "Pantai pasir putih yang indah dan cocok menikmati sunset.",
    gambar: IMG_BASE + "santolo.webp"
  },
  {
    id: 4,
    nama: "Gunung Cikuray",
    deskripsi: "Gunung tertinggi di Garut dan favorit pendaki.",
    gambar: IMG_BASE + "papandayan.jpeg"
  }
];

let dataPaket = [
  {
    id: 1,
    nama: "Paket Adventure 3D2N",
    durasi: "3 Hari 2 Malam",
    harga: "Rp 1.500.000",
    destinasi: "Papandayan, Kamojang, Santolo",
    status: "active"
  }
];

let dataPeta = [
  {
    id: 1,
    nama: "Gunung Papandayan",
    koordinat: "-7.3197, 107.7300",
    kategori: "Gunung",
    deskripsi: "Gunung berapi aktif"
  }
];

let dataLaporan = [];
let dataKontak = [];
let dataSlider = [
  {
    id: 1,
    gambar: IMG_BASE + "papandayan.jpeg",
    judul: "Gunung Papandayan"
  },
  {
    id: 2,
    gambar: IMG_BASE + "cipanas.webp",
    judul: "Cipanas"
  }
];

let dataUsers = [
  {
    id: 1,
    username: "admin",
    email: "admin@tougar.com",
    role: "Admin",
    status: "active"
  }
];

// ===== NAVIGATION =====
document.addEventListener('DOMContentLoaded', function() {
  // Navigation links
  const navLinks = document.querySelectorAll('.nav-link');
  const sections = document.querySelectorAll('.content-section');
  const pageTitle = document.getElementById('page-title');

  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Remove active class from all links and sections
      navLinks.forEach(l => l.classList.remove('active'));
      sections.forEach(s => s.classList.remove('active'));
      
      // Add active class to clicked link
      this.classList.add('active');
      
      // Show corresponding section
      const sectionId = this.getAttribute('data-section');
      const targetSection = document.getElementById(sectionId);
      if (targetSection) {
        targetSection.classList.add('active');
        
        // Update page title
        pageTitle.textContent = this.textContent.trim();
      }
    });
  });

  // Load initial data
  loadDashboardStats();
  loadDestinasiTable();
  loadPaketTable();
  loadPetaTable();
  loadLaporanTable();
  loadKontakTable();
  loadSliderGrid();
  loadUsersTable();
});

// ===== DASHBOARD =====
function loadDashboardStats() {
  document.getElementById('total-destinasi').textContent = dataDestinasi.length;
  document.getElementById('total-paket').textContent = dataPaket.length;
  document.getElementById('total-laporan').textContent = dataLaporan.length;
  document.getElementById('total-kontak').textContent = dataKontak.length;
}

// ===== DESTINASI =====
function loadDestinasiTable() {
  const tbody = document.getElementById('destinasi-table-body');
  
  if (dataDestinasi.length === 0) {
    tbody.innerHTML = '<tr><td colspan="5" class="no-data">Belum ada data destinasi</td></tr>';
    return;
  }

  tbody.innerHTML = dataDestinasi.map((item, index) => `
    <tr>
      <td>${index + 1}</td>
      <td><img src="${item.gambar}" alt="${item.nama}"></td>
      <td>${item.nama}</td>
      <td style="max-width: 300px;">${item.deskripsi}</td>
      <td>
        <button class="btn-edit" onclick="editDestinasi(${item.id})">Edit</button>
        <button class="btn-delete" onclick="deleteDestinasi(${item.id})">Hapus</button>
      </td>
    </tr>
  `).join('');
}

function showAddDestinasiModal() {
  const modal = createModal('Tambah Destinasi', `
    <div class="form-group">
      <label>Nama Destinasi</label>
      <input type="text" id="destinasi-nama" placeholder="Masukkan nama destinasi">
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea id="destinasi-deskripsi" placeholder="Deskripsi destinasi" rows="4"></textarea>
    </div>
    <div class="form-group">
      <label>URL Gambar</label>
      <input type="text" id="destinasi-gambar" placeholder="URL gambar">
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="saveDestinasi()">Simpan</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function saveDestinasi() {
  const newDestinasi = {
    id: dataDestinasi.length + 1,
    nama: document.getElementById('destinasi-nama').value,
    deskripsi: document.getElementById('destinasi-deskripsi').value,
    gambar: document.getElementById('destinasi-gambar').value
  };

  dataDestinasi.push(newDestinasi);
  loadDestinasiTable();
  loadDashboardStats();
  closeModal();
  showNotification('Destinasi berhasil ditambahkan!');
}

function editDestinasi(id) {
  const destinasi = dataDestinasi.find(d => d.id === id);
  if (!destinasi) return;

  const modal = createModal('Edit Destinasi', `
    <div class="form-group">
      <label>Nama Destinasi</label>
      <input type="text" id="edit-destinasi-nama" value="${destinasi.nama}">
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea id="edit-destinasi-deskripsi" rows="4">${destinasi.deskripsi}</textarea>
    </div>
    <div class="form-group">
      <label>URL Gambar</label>
      <input type="text" id="edit-destinasi-gambar" value="${destinasi.gambar}">
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="updateDestinasi(${id})">Update</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function updateDestinasi(id) {
  const index = dataDestinasi.findIndex(d => d.id === id);
  if (index === -1) return;

  dataDestinasi[index] = {
    ...dataDestinasi[index],
    nama: document.getElementById('edit-destinasi-nama').value,
    deskripsi: document.getElementById('edit-destinasi-deskripsi').value,
    gambar: document.getElementById('edit-destinasi-gambar').value
  };

  loadDestinasiTable();
  closeModal();
  showNotification('Destinasi berhasil diupdate!');
}

function deleteDestinasi(id) {
  if (confirm('Apakah Anda yakin ingin menghapus destinasi ini?')) {
    dataDestinasi = dataDestinasi.filter(d => d.id !== id);
    loadDestinasiTable();
    loadDashboardStats();
    showNotification('Destinasi berhasil dihapus!');
  }
}

// ===== PAKET WISATA =====
function loadPaketTable() {
  const tbody = document.getElementById('paket-table-body');
  
  if (dataPaket.length === 0) {
    tbody.innerHTML = '<tr><td colspan="7" class="no-data">Belum ada data paket wisata</td></tr>';
    return;
  }

  tbody.innerHTML = dataPaket.map((item, index) => `
    <tr>
      <td>${index + 1}</td>
      <td>${item.nama}</td>
      <td>${item.durasi}</td>
      <td>${item.harga}</td>
      <td>${item.destinasi}</td>
      <td><span class="status-badge status-${item.status}">${item.status === 'active' ? 'Aktif' : 'Tidak Aktif'}</span></td>
      <td>
        <button class="btn-edit" onclick="editPaket(${item.id})">Edit</button>
        <button class="btn-delete" onclick="deletePaket(${item.id})">Hapus</button>
      </td>
    </tr>
  `).join('');
}

function showAddPaketModal() {
  const modal = createModal('Tambah Paket Wisata', `
    <div class="form-group">
      <label>Nama Paket</label>
      <input type="text" id="paket-nama" placeholder="Masukkan nama paket">
    </div>
    <div class="form-group">
      <label>Durasi</label>
      <input type="text" id="paket-durasi" placeholder="3 Hari 2 Malam">
    </div>
    <div class="form-group">
      <label>Harga</label>
      <input type="text" id="paket-harga" placeholder="Rp 0">
    </div>
    <div class="form-group">
      <label>Destinasi</label>
      <input type="text" id="paket-destinasi" placeholder="Destinasi yang dikunjungi">
    </div>
    <div class="form-group">
      <label>Status</label>
      <select id="paket-status">
        <option value="active">Aktif</option>
        <option value="inactive">Tidak Aktif</option>
      </select>
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="savePaket()">Simpan</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function savePaket() {
  const newPaket = {
    id: dataPaket.length + 1,
    nama: document.getElementById('paket-nama').value,
    durasi: document.getElementById('paket-durasi').value,
    harga: document.getElementById('paket-harga').value,
    destinasi: document.getElementById('paket-destinasi').value,
    status: document.getElementById('paket-status').value
  };

  dataPaket.push(newPaket);
  loadPaketTable();
  loadDashboardStats();
  closeModal();
  showNotification('Paket wisata berhasil ditambahkan!');
}

function editPaket(id) {
  const paket = dataPaket.find(p => p.id === id);
  if (!paket) return;

  const modal = createModal('Edit Paket Wisata', `
    <div class="form-group">
      <label>Nama Paket</label>
      <input type="text" id="edit-paket-nama" value="${paket.nama}">
    </div>
    <div class="form-group">
      <label>Durasi</label>
      <input type="text" id="edit-paket-durasi" value="${paket.durasi}">
    </div>
    <div class="form-group">
      <label>Harga</label>
      <input type="text" id="edit-paket-harga" value="${paket.harga}">
    </div>
    <div class="form-group">
      <label>Destinasi</label>
      <input type="text" id="edit-paket-destinasi" value="${paket.destinasi}">
    </div>
    <div class="form-group">
      <label>Status</label>
      <select id="edit-paket-status">
        <option value="active" ${paket.status === 'active' ? 'selected' : ''}>Aktif</option>
        <option value="inactive" ${paket.status === 'inactive' ? 'selected' : ''}>Tidak Aktif</option>
      </select>
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="updatePaket(${id})">Update</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function updatePaket(id) {
  const index = dataPaket.findIndex(p => p.id === id);
  if (index === -1) return;

  dataPaket[index] = {
    ...dataPaket[index],
    nama: document.getElementById('edit-paket-nama').value,
    durasi: document.getElementById('edit-paket-durasi').value,
    harga: document.getElementById('edit-paket-harga').value,
    destinasi: document.getElementById('edit-paket-destinasi').value,
    status: document.getElementById('edit-paket-status').value
  };

  loadPaketTable();
  closeModal();
  showNotification('Paket wisata berhasil diupdate!');
}

function deletePaket(id) {
  if (confirm('Apakah Anda yakin ingin menghapus paket ini?')) {
    dataPaket = dataPaket.filter(p => p.id !== id);
    loadPaketTable();
    loadDashboardStats();
    showNotification('Paket wisata berhasil dihapus!');
  }
}

// ===== PETA =====
function loadPetaTable() {
  const tbody = document.getElementById('peta-table-body');
  
  if (dataPeta.length === 0) {
    tbody.innerHTML = '<tr><td colspan="6" class="no-data">Belum ada data lokasi</td></tr>';
    return;
  }

  tbody.innerHTML = dataPeta.map((item, index) => `
    <tr>
      <td>${index + 1}</td>
      <td>${item.nama}</td>
      <td>${item.koordinat}</td>
      <td>${item.kategori}</td>
      <td>${item.deskripsi}</td>
      <td>
        <button class="btn-edit" onclick="editPeta(${item.id})">Edit</button>
        <button class="btn-delete" onclick="deletePeta(${item.id})">Hapus</button>
      </td>
    </tr>
  `).join('');
}

function showAddPetaModal() {
  const modal = createModal('Tambah Lokasi Peta', `
    <div class="form-group">
      <label>Nama Lokasi</label>
      <input type="text" id="peta-nama" placeholder="Nama lokasi">
    </div>
    <div class="form-group">
      <label>Koordinat (Lat, Long)</label>
      <input type="text" id="peta-koordinat" placeholder="-7.0000, 107.0000">
    </div>
    <div class="form-group">
      <label>Kategori</label>
      <select id="peta-kategori">
        <option value="Gunung">Gunung</option>
        <option value="Pantai">Pantai</option>
        <option value="Danau">Danau</option>
        <option value="Wisata Air">Wisata Air</option>
        <option value="Lainnya">Lainnya</option>
      </select>
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea id="peta-deskripsi" placeholder="Deskripsi lokasi"></textarea>
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="savePeta()">Simpan</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function savePeta() {
  const newPeta = {
    id: dataPeta.length + 1,
    nama: document.getElementById('peta-nama').value,
    koordinat: document.getElementById('peta-koordinat').value,
    kategori: document.getElementById('peta-kategori').value,
    deskripsi: document.getElementById('peta-deskripsi').value
  };

  dataPeta.push(newPeta);
  loadPetaTable();
  closeModal();
  showNotification('Lokasi berhasil ditambahkan!');
}

function editPeta(id) {
  const peta = dataPeta.find(p => p.id === id);
  if (!peta) return;

  const modal = createModal('Edit Lokasi Peta', `
    <div class="form-group">
      <label>Nama Lokasi</label>
      <input type="text" id="edit-peta-nama" value="${peta.nama}">
    </div>
    <div class="form-group">
      <label>Koordinat</label>
      <input type="text" id="edit-peta-koordinat" value="${peta.koordinat}">
    </div>
    <div class="form-group">
      <label>Kategori</label>
      <select id="edit-peta-kategori">
        <option value="Gunung" ${peta.kategori === 'Gunung' ? 'selected' : ''}>Gunung</option>
        <option value="Pantai" ${peta.kategori === 'Pantai' ? 'selected' : ''}>Pantai</option>
        <option value="Danau" ${peta.kategori === 'Danau' ? 'selected' : ''}>Danau</option>
        <option value="Wisata Air" ${peta.kategori === 'Wisata Air' ? 'selected' : ''}>Wisata Air</option>
        <option value="Lainnya" ${peta.kategori === 'Lainnya' ? 'selected' : ''}>Lainnya</option>
      </select>
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea id="edit-peta-deskripsi">${peta.deskripsi}</textarea>
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="updatePeta(${id})">Update</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function updatePeta(id) {
  const index = dataPeta.findIndex(p => p.id === id);
  if (index === -1) return;

  dataPeta[index] = {
    ...dataPeta[index],
    nama: document.getElementById('edit-peta-nama').value,
    koordinat: document.getElementById('edit-peta-koordinat').value,
    kategori: document.getElementById('edit-peta-kategori').value,
    deskripsi: document.getElementById('edit-peta-deskripsi').value
  };

  loadPetaTable();
  closeModal();
  showNotification('Lokasi berhasil diupdate!');
}

function deletePeta(id) {
  if (confirm('Apakah Anda yakin ingin menghapus lokasi ini?')) {
    dataPeta = dataPeta.filter(p => p.id !== id);
    loadPetaTable();
    showNotification('Lokasi berhasil dihapus!');
  }
}

// ===== LAPORAN =====
function loadLaporanTable() {
  const tbody = document.getElementById('laporan-table-body');
  
  if (dataLaporan.length === 0) {
    tbody.innerHTML = '<tr><td colspan="7" class="no-data">Belum ada laporan</td></tr>';
    return;
  }

  tbody.innerHTML = dataLaporan.map((item, index) => `
    <tr>
      <td>${index + 1}</td>
      <td>${item.nama}</td>
      <td>${item.email}</td>
      <td>${item.kategori}</td>
      <td>${item.pesan}</td>
      <td>${item.tanggal}</td>
      <td>
        <button class="btn-delete" onclick="deleteLaporan(${item.id})">Hapus</button>
      </td>
    </tr>
  `).join('');
}

function deleteLaporan(id) {
  if (confirm('Apakah Anda yakin ingin menghapus laporan ini?')) {
    dataLaporan = dataLaporan.filter(l => l.id !== id);
    loadLaporanTable();
    loadDashboardStats();
    showNotification('Laporan berhasil dihapus!');
  }
}

// ===== KONTAK =====
function loadKontakTable() {
  const tbody = document.getElementById('kontak-table-body');
  
  if (dataKontak.length === 0) {
    tbody.innerHTML = '<tr><td colspan="7" class="no-data">Belum ada pesan kontak</td></tr>';
    return;
  }

  tbody.innerHTML = dataKontak.map((item, index) => `
    <tr>
      <td>${index + 1}</td>
      <td>${item.nama}</td>
      <td>${item.email}</td>
      <td>${item.telepon}</td>
      <td>${item.pesan}</td>
      <td>${item.tanggal}</td>
      <td>
        <button class="btn-delete" onclick="deleteKontak(${item.id})">Hapus</button>
      </td>
    </tr>
  `).join('');
}

function deleteKontak(id) {
  if (confirm('Apakah Anda yakin ingin menghapus pesan ini?')) {
    dataKontak = dataKontak.filter(k => k.id !== id);
    loadKontakTable();
    loadDashboardStats();
    showNotification('Pesan kontak berhasil dihapus!');
  }
}

// ===== SLIDER =====
function loadSliderGrid() {
  const grid = document.getElementById('slider-grid');
  
  if (dataSlider.length === 0) {
    grid.innerHTML = '<p class="no-data">Belum ada slide</p>';
    return;
  }

  grid.innerHTML = dataSlider.map(item => `
    <div class="slider-card">
      <img src="${item.gambar}" alt="${item.judul}">
      <div class="slider-card-body">
        <h4>${item.judul}</h4>
        <div class="slider-card-actions">
          <button class="btn-edit" onclick="editSlider(${item.id})">Edit</button>
          <button class="btn-delete" onclick="deleteSlider(${item.id})">Hapus</button>
        </div>
      </div>
    </div>
  `).join('');
}

function showAddSliderModal() {
  const modal = createModal('Tambah Slide', `
    <div class="form-group">
      <label>Judul Slide</label>
      <input type="text" id="slider-judul" placeholder="Judul slide">
    </div>
    <div class="form-group">
      <label>URL Gambar</label>
      <input type="text" id="slider-gambar" placeholder="URL gambar">
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="saveSlider()">Simpan</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function saveSlider() {
  const newSlider = {
    id: dataSlider.length + 1,
    judul: document.getElementById('slider-judul').value,
    gambar: document.getElementById('slider-gambar').value
  };

  dataSlider.push(newSlider);
  loadSliderGrid();
  closeModal();
  showNotification('Slide berhasil ditambahkan!');
}

function editSlider(id) {
  const slider = dataSlider.find(s => s.id === id);
  if (!slider) return;

  const modal = createModal('Edit Slide', `
    <div class="form-group">
      <label>Judul Slide</label>
      <input type="text" id="edit-slider-judul" value="${slider.judul}">
    </div>
    <div class="form-group">
      <label>URL Gambar</label>
      <input type="text" id="edit-slider-gambar" value="${slider.gambar}">
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="updateSlider(${id})">Update</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function updateSlider(id) {
  const index = dataSlider.findIndex(s => s.id === id);
  if (index === -1) return;

  dataSlider[index] = {
    ...dataSlider[index],
    judul: document.getElementById('edit-slider-judul').value,
    gambar: document.getElementById('edit-slider-gambar').value
  };

  loadSliderGrid();
  closeModal();
  showNotification('Slide berhasil diupdate!');
}

function deleteSlider(id) {
  if (confirm('Apakah Anda yakin ingin menghapus slide ini?')) {
    dataSlider = dataSlider.filter(s => s.id !== id);
    loadSliderGrid();
    showNotification('Slide berhasil dihapus!');
  }
}

// ===== USERS =====
function loadUsersTable() {
  const tbody = document.getElementById('users-table-body');
  
  if (dataUsers.length === 0) {
    tbody.innerHTML = '<tr><td colspan="6" class="no-data">Belum ada data user</td></tr>';
    return;
  }

  tbody.innerHTML = dataUsers.map((item, index) => `
    <tr>
      <td>${index + 1}</td>
      <td>${item.username}</td>
      <td>${item.email}</td>
      <td>${item.role}</td>
      <td><span class="status-badge status-${item.status}">${item.status === 'active' ? 'Aktif' : 'Tidak Aktif'}</span></td>
      <td>
        <button class="btn-edit" onclick="editUser(${item.id})">Edit</button>
        <button class="btn-delete" onclick="deleteUser(${item.id})">Hapus</button>
      </td>
    </tr>
  `).join('');
}

function showAddUserModal() {
  const modal = createModal('Tambah User', `
    <div class="form-group">
      <label>Username</label>
      <input type="text" id="user-username" placeholder="Username">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" id="user-email" placeholder="email@example.com">
    </div>
    <div class="form-group">
      <label>Role</label>
      <select id="user-role">
        <option value="Admin">Admin</option>
        <option value="User">User</option>
      </select>
    </div>
    <div class="form-group">
      <label>Status</label>
      <select id="user-status">
        <option value="active">Aktif</option>
        <option value="inactive">Tidak Aktif</option>
      </select>
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="saveUser()">Simpan</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function saveUser() {
  const newUser = {
    id: dataUsers.length + 1,
    username: document.getElementById('user-username').value,
    email: document.getElementById('user-email').value,
    role: document.getElementById('user-role').value,
    status: document.getElementById('user-status').value
  };

  dataUsers.push(newUser);
  loadUsersTable();
  closeModal();
  showNotification('User berhasil ditambahkan!');
}

function editUser(id) {
  const user = dataUsers.find(u => u.id === id);
  if (!user) return;

  const modal = createModal('Edit User', `
    <div class="form-group">
      <label>Username</label>
      <input type="text" id="edit-user-username" value="${user.username}">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" id="edit-user-email" value="${user.email}">
    </div>
    <div class="form-group">
      <label>Role</label>
      <select id="edit-user-role">
        <option value="Admin" ${user.role === 'Admin' ? 'selected' : ''}>Admin</option>
        <option value="User" ${user.role === 'User' ? 'selected' : ''}>User</option>
      </select>
    </div>
    <div class="form-group">
      <label>Status</label>
      <select id="edit-user-status">
        <option value="active" ${user.status === 'active' ? 'selected' : ''}>Aktif</option>
        <option value="inactive" ${user.status === 'inactive' ? 'selected' : ''}>Tidak Aktif</option>
      </select>
    </div>
    <div class="form-actions">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="updateUser(${id})">Update</button>
    </div>
  `);
  
  document.getElementById('modal-container').appendChild(modal);
  modal.classList.add('active');
}

function updateUser(id) {
  const index = dataUsers.findIndex(u => u.id === id);
  if (index === -1) return;

  dataUsers[index] = {
    ...dataUsers[index],
    username: document.getElementById('edit-user-username').value,
    email: document.getElementById('edit-user-email').value,
    role: document.getElementById('edit-user-role').value,
    status: document.getElementById('edit-user-status').value
  };

  loadUsersTable();
  closeModal();
  showNotification('User berhasil diupdate!');
}

function deleteUser(id) {
  if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
    dataUsers = dataUsers.filter(u => u.id !== id);
    loadUsersTable();
    showNotification('User berhasil dihapus!');
  }
}

// ===== MODAL HELPER =====
function createModal(title, content) {
  const modal = document.createElement('div');
  modal.className = 'modal';
  modal.innerHTML = `
    <div class="modal-content">
      <div class="modal-header">
        <h3>${title}</h3>
        <button class="modal-close" onclick="closeModal()">×</button>
      </div>
      ${content}
    </div>
  `;
  return modal;
}

function closeModal() {
  const modalContainer = document.getElementById('modal-container');
  modalContainer.innerHTML = '';
}

// ===== NOTIFICATION =====
function showNotification(message) {
  const notification = document.createElement('div');
  notification.style.cssText = `
    position: fixed;
    top: 20px;
    right: 20px;
    background: #10b981;
    color: white;
    padding: 15px 25px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    z-index: 10000;
    animation: slideInRight 0.3s ease;
  `;
  notification.textContent = message;
  
  document.body.appendChild(notification);
  
  setTimeout(() => {
    notification.style.animation = 'slideOutRight 0.3s ease';
    setTimeout(() => notification.remove(), 300);
  }, 3000);
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
  @keyframes slideInRight {
    from {
      transform: translateX(400px);
      opacity: 0;
    }
    to {
      transform: translateX(0);
      opacity: 1;
    }
  }
  
  @keyframes slideOutRight {
    from {
      transform: translateX(0);
      opacity: 1;
    }
    to {
      transform: translateX(400px);
      opacity: 0;
    }
  }
`;
document.head.appendChild(style);