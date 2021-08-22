create table documents
(
    id          int auto_increment
        primary key,
    uuid        varchar(255) not null,
    author      varchar(255) not null,
    locale      varchar(255) not null,
    category_id int          not null,
    value       text         not null,
    created_at  datetime     null,
    updated_at  datetime     null
);

# Делаем запрос на кол-во документов в категории + последнее обновление в каждой категории

create table categories
(
    id   int auto_increment
        primary key,
    name varchar(200) not null
);

create table events
(
    id int auto_increment,
    time datetime not null,
    app_id int not null,
    event varchar(255) not null,
    message text not null,
    constraint events_pk
        primary key (id)
);


INSERT INTO school.categories (id, name) VALUES (1, 'Art');
INSERT INTO school.categories (id, name) VALUES (2, 'Antiques & Collectibles');
INSERT INTO school.categories (id, name) VALUES (3, 'Architecture');
INSERT INTO school.categories (id, name) VALUES (4, 'Music');
INSERT INTO school.categories (id, name) VALUES (5, 'Performing Arts');
INSERT INTO school.categories (id, name) VALUES (6, 'Photography');
INSERT INTO school.categories (id, name) VALUES (7, 'Visual Arts');
INSERT INTO school.categories (id, name) VALUES (8, 'Biography & Memoir');
INSERT INTO school.categories (id, name) VALUES (9, 'Business');
INSERT INTO school.categories (id, name) VALUES (10, 'Business Analytics');
INSERT INTO school.categories (id, name) VALUES (11, 'Human Resources & Personnel Management');
INSERT INTO school.categories (id, name) VALUES (12, 'Industries');
INSERT INTO school.categories (id, name) VALUES (13, 'Management');
INSERT INTO school.categories (id, name) VALUES (14, 'Marketing');
INSERT INTO school.categories (id, name) VALUES (15, 'Production & Operations Management');
INSERT INTO school.categories (id, name) VALUES (16, 'Project Management');
INSERT INTO school.categories (id, name) VALUES (17, 'Small Business & Entrepreneurs');
INSERT INTO school.categories (id, name) VALUES (18, 'Strategic Planning');
INSERT INTO school.categories (id, name) VALUES (19, 'Career & Growth');
INSERT INTO school.categories (id, name) VALUES (20, 'Careers');
INSERT INTO school.categories (id, name) VALUES (21, 'Job Hunting');
INSERT INTO school.categories (id, name) VALUES (22, 'Leadership');
INSERT INTO school.categories (id, name) VALUES (23, 'Motivational');
INSERT INTO school.categories (id, name) VALUES (24, 'Professional Skills');
INSERT INTO school.categories (id, name) VALUES (25, 'Resumes');
INSERT INTO school.categories (id, name) VALUES (26, 'Comics & Graphic Novels');
INSERT INTO school.categories (id, name) VALUES (27, 'Computers');
INSERT INTO school.categories (id, name) VALUES (28, 'Applications & Software');
INSERT INTO school.categories (id, name) VALUES (29, 'CAD-CAM');
INSERT INTO school.categories (id, name) VALUES (30, 'Databases');
INSERT INTO school.categories (id, name) VALUES (31, 'Enterprise Applications');
INSERT INTO school.categories (id, name) VALUES (32, 'Hardware');
INSERT INTO school.categories (id, name) VALUES (33, 'Intelligence (AI) & Semantics');
INSERT INTO school.categories (id, name) VALUES (34, 'Internet & Web');
INSERT INTO school.categories (id, name) VALUES (35, 'Networking');
INSERT INTO school.categories (id, name) VALUES (36, 'Operating Systems');
INSERT INTO school.categories (id, name) VALUES (37, 'Programming');
INSERT INTO school.categories (id, name) VALUES (38, 'Cooking, Food & Wine');
INSERT INTO school.categories (id, name) VALUES (39, 'Erotica');
INSERT INTO school.categories (id, name) VALUES (40, 'BDSM');
INSERT INTO school.categories (id, name) VALUES (41, 'Collections & Anthologies');
INSERT INTO school.categories (id, name) VALUES (42, 'Historical');
INSERT INTO school.categories (id, name) VALUES (43, 'LGBTQIA+');
INSERT INTO school.categories (id, name) VALUES (44, 'Science Fiction, Fantasy, & Horror');
INSERT INTO school.categories (id, name) VALUES (45, 'Finance & Money Management');
INSERT INTO school.categories (id, name) VALUES (46, 'Accounting & Bookkeeping');
INSERT INTO school.categories (id, name) VALUES (47, 'Auditing');
INSERT INTO school.categories (id, name) VALUES (48, 'Budgeting');
INSERT INTO school.categories (id, name) VALUES (49, 'Corporate Finance');
INSERT INTO school.categories (id, name) VALUES (50, 'Economics');
INSERT INTO school.categories (id, name) VALUES (51, 'Taxation');
INSERT INTO school.categories (id, name) VALUES (52, 'Foreign Language Studies');
INSERT INTO school.categories (id, name) VALUES (53, 'Chinese');
INSERT INTO school.categories (id, name) VALUES (54, 'ESL');
INSERT INTO school.categories (id, name) VALUES (55, 'French');
INSERT INTO school.categories (id, name) VALUES (56, 'German');
INSERT INTO school.categories (id, name) VALUES (57, 'Italian');
INSERT INTO school.categories (id, name) VALUES (58, 'Japanese');
INSERT INTO school.categories (id, name) VALUES (59, 'Spanish');
INSERT INTO school.categories (id, name) VALUES (60, 'Games & Activities');
INSERT INTO school.categories (id, name) VALUES (61, 'Card Games');
INSERT INTO school.categories (id, name) VALUES (62, 'Fantasy Sports');
INSERT INTO school.categories (id, name) VALUES (63, 'Table Top Roleplaying');
INSERT INTO school.categories (id, name) VALUES (64, 'Video Games');
INSERT INTO school.categories (id, name) VALUES (65, 'History');
INSERT INTO school.categories (id, name) VALUES (66, 'Ancient');
INSERT INTO school.categories (id, name) VALUES (67, 'Modern');
INSERT INTO school.categories (id, name) VALUES (68, 'United States');
INSERT INTO school.categories (id, name) VALUES (69, 'Wars & Military');
INSERT INTO school.categories (id, name) VALUES (70, 'Home & Garden');
INSERT INTO school.categories (id, name) VALUES (71, 'Crafts & Hobbies');
INSERT INTO school.categories (id, name) VALUES (72, 'Gardening');
INSERT INTO school.categories (id, name) VALUES (73, 'Home Improvement');
INSERT INTO school.categories (id, name) VALUES (74, 'Language Arts & Discipline');
INSERT INTO school.categories (id, name) VALUES (75, 'Law');
INSERT INTO school.categories (id, name) VALUES (76, 'Business & Financial');
INSERT INTO school.categories (id, name) VALUES (77, 'Contracts & Agreements');
INSERT INTO school.categories (id, name) VALUES (78, 'Criminal Law');
INSERT INTO school.categories (id, name) VALUES (79, 'Environmental');
INSERT INTO school.categories (id, name) VALUES (80, 'Litigation');
INSERT INTO school.categories (id, name) VALUES (81, 'Philippine Law');
INSERT INTO school.categories (id, name) VALUES (82, 'Reference');
INSERT INTO school.categories (id, name) VALUES (83, 'Lifestyle');
INSERT INTO school.categories (id, name) VALUES (84, 'Beauty & Grooming');
INSERT INTO school.categories (id, name) VALUES (85, 'Fashion');
INSERT INTO school.categories (id, name) VALUES (86, 'Men''s Interest');
INSERT INTO school.categories (id, name) VALUES (87, 'Women''s Interest');
INSERT INTO school.categories (id, name) VALUES (88, 'Literary Criticism');
INSERT INTO school.categories (id, name) VALUES (89, 'Philosophy');
INSERT INTO school.categories (id, name) VALUES (90, 'Politics');
INSERT INTO school.categories (id, name) VALUES (91, 'American Government');
INSERT INTO school.categories (id, name) VALUES (92, 'International Relations');
INSERT INTO school.categories (id, name) VALUES (93, 'Political Science');
INSERT INTO school.categories (id, name) VALUES (94, 'World');
INSERT INTO school.categories (id, name) VALUES (95, 'Religion & Spirituality');
INSERT INTO school.categories (id, name) VALUES (96, 'Buddhism');
INSERT INTO school.categories (id, name) VALUES (97, 'Christianity');
INSERT INTO school.categories (id, name) VALUES (98, 'Cults');
INSERT INTO school.categories (id, name) VALUES (99, 'Eastern');
INSERT INTO school.categories (id, name) VALUES (100, 'Hinduism');
INSERT INTO school.categories (id, name) VALUES (101, 'Islam');
INSERT INTO school.categories (id, name) VALUES (102, 'Judaism');
INSERT INTO school.categories (id, name) VALUES (103, 'New Age & Spirituality');
INSERT INTO school.categories (id, name) VALUES (104, 'Occult & Paranormal');
INSERT INTO school.categories (id, name) VALUES (105, 'Theology');
INSERT INTO school.categories (id, name) VALUES (106, 'Wicca / Witchcraft');
INSERT INTO school.categories (id, name) VALUES (107, 'Science & Mathematics');
INSERT INTO school.categories (id, name) VALUES (108, 'Astronomy & Space Sciences');
INSERT INTO school.categories (id, name) VALUES (109, 'Biology');
INSERT INTO school.categories (id, name) VALUES (110, 'Botany');
INSERT INTO school.categories (id, name) VALUES (111, 'Chemistry');
INSERT INTO school.categories (id, name) VALUES (112, 'Earth Sciences');
INSERT INTO school.categories (id, name) VALUES (113, 'Environmental Science');
INSERT INTO school.categories (id, name) VALUES (114, 'Mathematics');
INSERT INTO school.categories (id, name) VALUES (115, 'Medical');
INSERT INTO school.categories (id, name) VALUES (116, 'Nature');
INSERT INTO school.categories (id, name) VALUES (117, 'Physics');
INSERT INTO school.categories (id, name) VALUES (118, 'Psychology');
INSERT INTO school.categories (id, name) VALUES (119, 'Self-Improvement');
INSERT INTO school.categories (id, name) VALUES (120, 'Addiction');
INSERT INTO school.categories (id, name) VALUES (121, 'Mental Health');
INSERT INTO school.categories (id, name) VALUES (122, 'Sexuality');
INSERT INTO school.categories (id, name) VALUES (123, 'Sheet Music');
INSERT INTO school.categories (id, name) VALUES (124, 'Social Science');
INSERT INTO school.categories (id, name) VALUES (125, 'Anthropology');
INSERT INTO school.categories (id, name) VALUES (126, 'Archaeology');
INSERT INTO school.categories (id, name) VALUES (127, 'Crime & Violence');
INSERT INTO school.categories (id, name) VALUES (128, 'Discrimination & Race Relations');
INSERT INTO school.categories (id, name) VALUES (129, 'Emigration, Immigration, and Refugees');
INSERT INTO school.categories (id, name) VALUES (130, 'Ethnic Studies');
INSERT INTO school.categories (id, name) VALUES (131, 'Gender Studies');
INSERT INTO school.categories (id, name) VALUES (132, 'LGBTQIA+ Studies');
INSERT INTO school.categories (id, name) VALUES (133, 'Popular Culture & Media Studies');
INSERT INTO school.categories (id, name) VALUES (134, 'Poverty & Homelessness');
INSERT INTO school.categories (id, name) VALUES (135, 'Sexual Abuse & Harassment');
INSERT INTO school.categories (id, name) VALUES (136, 'Sports & Recreation');
INSERT INTO school.categories (id, name) VALUES (137, 'Baseball');
INSERT INTO school.categories (id, name) VALUES (138, 'Basketball');
INSERT INTO school.categories (id, name) VALUES (139, 'Bodybuilding & Weight Training');
INSERT INTO school.categories (id, name) VALUES (140, 'Boxing');
INSERT INTO school.categories (id, name) VALUES (141, 'Cycling');
INSERT INTO school.categories (id, name) VALUES (142, 'Football');
INSERT INTO school.categories (id, name) VALUES (143, 'Martial Arts');
INSERT INTO school.categories (id, name) VALUES (144, 'Motor Sports');
INSERT INTO school.categories (id, name) VALUES (145, 'Outdoors');
INSERT INTO school.categories (id, name) VALUES (146, 'Running & Jogging');
INSERT INTO school.categories (id, name) VALUES (147, 'Shooting & Hunting');
INSERT INTO school.categories (id, name) VALUES (148, 'Snow Sports');
INSERT INTO school.categories (id, name) VALUES (149, 'Soccer');
INSERT INTO school.categories (id, name) VALUES (150, 'Study Aids & Test Prep');
INSERT INTO school.categories (id, name) VALUES (151, 'Book Notes');
INSERT INTO school.categories (id, name) VALUES (152, 'College Entrance Exams');
INSERT INTO school.categories (id, name) VALUES (153, 'Language Exams');
INSERT INTO school.categories (id, name) VALUES (154, 'Professional & Vocational Exams');
INSERT INTO school.categories (id, name) VALUES (155, 'Study & Test-Taking Skills');
INSERT INTO school.categories (id, name) VALUES (156, 'Study Guides');
INSERT INTO school.categories (id, name) VALUES (157, 'Teaching Methods & Materials');
INSERT INTO school.categories (id, name) VALUES (158, 'Early Childhood Education');
INSERT INTO school.categories (id, name) VALUES (159, 'Education Philosophy & Theory');
INSERT INTO school.categories (id, name) VALUES (160, 'Health & Sexuality');
INSERT INTO school.categories (id, name) VALUES (161, 'Home Schooling');
INSERT INTO school.categories (id, name) VALUES (162, 'Mathematics');
INSERT INTO school.categories (id, name) VALUES (163, 'Reading & Phonics');
INSERT INTO school.categories (id, name) VALUES (164, 'Science & Technology');
INSERT INTO school.categories (id, name) VALUES (165, 'Social Sciences');
INSERT INTO school.categories (id, name) VALUES (166, 'Special Education');
INSERT INTO school.categories (id, name) VALUES (167, 'Technology & Engineering');
INSERT INTO school.categories (id, name) VALUES (168, 'Automotive');
INSERT INTO school.categories (id, name) VALUES (169, 'Aviation & Aeronautics');
INSERT INTO school.categories (id, name) VALUES (170, 'Chemical');
INSERT INTO school.categories (id, name) VALUES (171, 'Civil');
INSERT INTO school.categories (id, name) VALUES (172, 'Construction');
INSERT INTO school.categories (id, name) VALUES (173, 'Construction Standards & Codes');
INSERT INTO school.categories (id, name) VALUES (174, 'Electrical Engineering & Electronics');
INSERT INTO school.categories (id, name) VALUES (175, 'Environmental');
INSERT INTO school.categories (id, name) VALUES (176, 'Industrial Design');
INSERT INTO school.categories (id, name) VALUES (177, 'Industrial Health & Safety');
INSERT INTO school.categories (id, name) VALUES (178, 'Mechanical Engineering');
INSERT INTO school.categories (id, name) VALUES (179, 'Petroleum');
INSERT INTO school.categories (id, name) VALUES (180, 'Power Resources');
INSERT INTO school.categories (id, name) VALUES (181, 'Robotics');
INSERT INTO school.categories (id, name) VALUES (182, 'Ships & Boats');
INSERT INTO school.categories (id, name) VALUES (183, 'Structural Engineering');
INSERT INTO school.categories (id, name) VALUES (184, 'Telecommunications');
INSERT INTO school.categories (id, name) VALUES (185, 'True Crime');
INSERT INTO school.categories (id, name) VALUES (186, 'Wellness');
INSERT INTO school.categories (id, name) VALUES (187, 'Body, Mind, & Spirit');
INSERT INTO school.categories (id, name) VALUES (188, 'Diet & Nutrition');
INSERT INTO school.categories (id, name) VALUES (189, 'Exercise & Fitness');
INSERT INTO school.categories (id, name) VALUES (190, 'Men''s Health');
INSERT INTO school.categories (id, name) VALUES (191, 'Relationships');
INSERT INTO school.categories (id, name) VALUES (192, 'Weight Loss');
INSERT INTO school.categories (id, name) VALUES (193, 'Women''s Health');
INSERT INTO school.categories (id, name) VALUES (194, 'Wellness');
INSERT INTO school.categories (id, name) VALUES (195, 'Body, Mind, & Spirit');
INSERT INTO school.categories (id, name) VALUES (196, 'Diet & Nutrition');
INSERT INTO school.categories (id, name) VALUES (197, 'Exercise & Fitness');
INSERT INTO school.categories (id, name) VALUES (198, 'Men''s Health');
INSERT INTO school.categories (id, name) VALUES (199, 'Relationships');
INSERT INTO school.categories (id, name) VALUES (200, 'Weight Loss');
INSERT INTO school.categories (id, name) VALUES (201, 'Women''s Health');