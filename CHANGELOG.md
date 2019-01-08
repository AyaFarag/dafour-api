# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]
### Added
 - Sliders handling to admin panel (create, view, update, delete)
 - Views, Model and Migratios for sliders.

### Changed
 - All route names containing `::` to `.` instead.

---

## [0.5.0] - 2018-3-6
### Added 
 - Details for Professional and Student in their home page (i.e. no. of downloads .etc)
 - Plans to home page
 - For each download insert a new record in the `downloads` table in the database.
 - Plan subscription view.

### Changed
 - Limited number of plans to be added by admi to 3 (for there are only 3 in home page)

---

## [0.4.0] - 2018-2-27
### Added
 - Search for documents
 - Download documents

---

## [0.3.1] - 2018-02-24
### Added 
 - `education_types.php` config file to carry the education types.
 - Select box to upload document form for education types

---

## [0.3.0] - 2018-02-18
### Added
- 'All Stuendents' view.
- 'blocked' attribute for professional and student.
- Delete professional.
- Delete student.
- Block student.
- Block professional.
- 'title_en' and 'title_ar' attribute to plans.
- 'description_en' and 'description_ar' attribute to plans.
- Plans complete handling by admin.

### Removed
- 'Add Student' and 'Add Professional' links from admin panel.
- 'title' attribute from plans.
- 'description' attribute from plans.

---

## [0.2.0] - 2018-02-18
### Added
- Upload document complete functionality.

### Changed
- 'title' attribute in keywords table to be unique.

### Fixed
- Keyword, Paper, Shool, Professional, and Location relations.

### Removed
- 'location_id' attribute from 'Paper' model.

---

## [0.1.1] - 2018-02-17

### Added
- Professionals, Students, Plans links to the admin dashboard sidebar.
- All Professional view.

### Changed
- Fontawesome version to the new one.

