USE dynamic_rol;


/*VISTA DE USUARIOS CON SUS ENDPOINTS*/
CREATE VIEW view_endpoints_user AS 
SELECT u.id AS user_id , u.name AS user_name ,p.id AS permission_id,p.name AS permission_name , e.id AS endpoint_id, e.name AS enpoint_name FROM users u
INNER JOIN user_role ur
ON u.id = ur.user_id
INNER JOIN roles r
ON ur.role_id = r.id
INNER JOIN role_permission rp
ON rp.role_id = r.idz
INNER JOIN permissions p
ON p.id = rp.permission_id
INNER JOIN endpoints e
ON e.permission_id = p.id;


/*VISTA DE USUARIOS QUE NO TIENEN ENDPOINTS*/
CREATE VIEW view_users_not_endpoint AS 
SELECT u.id AS user_id , u.name AS user_name FROM users u
WHERE u.id  NOT IN  (SELECT user_id FROM view_endpoints_user);