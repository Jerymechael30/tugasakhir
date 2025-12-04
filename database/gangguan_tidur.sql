-- Database
CREATE DATABASE IF NOT EXISTS gangguan_tidur;
USE gangguan_tidur;

-- Tabel: users (Untuk admin dan user)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT,
    role ENUM('admin','user') NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100),
    password VARCHAR(255) NOT NULL,
    no_hp VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    update_by INT,
    deleted BOOLEAN DEFAULT 0,
    deleted_at DATETIME,
    deleted_by INT
);

-- Tabel: m_cf_pakar (Skala Certainty Factor untuk Pakar)
CREATE TABLE m_cf_pakar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nilai DECIMAL(3,1) NOT NULL UNIQUE,
    label VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    update_by INT,
    deleted BOOLEAN DEFAULT 0,
    deleted_at DATETIME,
    deleted_by INT
);

-- Tabel: m_cf_user (Skala Certainty Factor untuk User)
CREATE TABLE m_cf_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nilai DECIMAL(3,1) NOT NULL UNIQUE,
    label VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    update_by INT,
    deleted BOOLEAN DEFAULT 0,
    deleted_at DATETIME,
    deleted_by INT
);

-- Tabel: m_gejala (Gejala gangguan tidur)
CREATE TABLE m_gejala (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode VARCHAR(10) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    update_by INT,
    deleted BOOLEAN DEFAULT 0,
    deleted_at DATETIME,
    deleted_by INT
);

-- Tabel: m_penyakit (Jenis-jenis gangguan tidur)
CREATE TABLE m_penyakit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode VARCHAR(10) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    solusi TEXT COMMENT 'Rekomendasi penanganan',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    update_by INT,
    deleted BOOLEAN DEFAULT 0,
    deleted_at DATETIME,
    deleted_by INT
);

-- Tabel: m_pengetahuan (Basis pengetahuan dengan CF Pakar)
CREATE TABLE m_pengetahuan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    penyakit_id INT NOT NULL,
    gejala_id INT NOT NULL,
    cf_pakar_id INT NOT NULL COMMENT 'Referensi ke skala CF pakar',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    update_by INT,
    deleted BOOLEAN DEFAULT 0,
    deleted_at DATETIME,
    deleted_by INT,
    FOREIGN KEY (penyakit_id) REFERENCES m_penyakit(id),
    FOREIGN KEY (gejala_id) REFERENCES m_gejala(id),
    FOREIGN KEY (cf_pakar_id) REFERENCES m_cf_pakar(id),
    UNIQUE KEY (penyakit_id, gejala_id)
);

-- Tabel: t_riwayat (Header diagnosa)
CREATE TABLE t_riwayat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT,
    jenis_kelamin ENUM('L','P'),
    umur INT,
    penyakit_id INT COMMENT 'Hasil diagnosa',
    cf_hasil DECIMAL(5,2) COMMENT 'Nilai Certainty Factor akhir (-1.0 sampai 1.0)',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    update_by INT,
    deleted BOOLEAN DEFAULT 0,
    deleted_at DATETIME,
    deleted_by INT,
    FOREIGN KEY (penyakit_id) REFERENCES m_penyakit(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tabel: t_riwayat_detail (Detail gejala yang dipilih dan CF User)
CREATE TABLE t_riwayat_detail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    riwayat_id INT NOT NULL,
    gejala_id INT NOT NULL,
    cf_user_id INT NOT NULL COMMENT 'Referensi ke skala CF user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    FOREIGN KEY (riwayat_id) REFERENCES t_riwayat(id),
    FOREIGN KEY (gejala_id) REFERENCES m_gejala(id),
    FOREIGN KEY (cf_user_id) REFERENCES m_cf_user(id)
);