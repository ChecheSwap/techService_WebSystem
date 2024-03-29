DROP VIEW IF EXISTS VIEW_REGISTERS_DATA;

CREATE VIEW VIEW_REGISTERS_DATA AS 
				SELECT EVENT.NAME AS "TIPO_DE_EVENTO", CREDENTIAL.ALIAS AS "ALIAS_USUARIO" , USR.NOMBRE AS "NOMBRE"     , 
				USR.APELLIDO AS "APELLIDO"           , PRIVS.NOMBRE AS "ROL_DE_USUARIO"    , EVENT.DESC AS "DESCRIPCION", 
				REG.FECHA AS "FECHA"                 , REG.HORA AS "HORA"                  , REG.COMMENTS AS "COMENTARIO"
				FROM REGISTERS AS REG 
				INNER JOIN EVENTS AS EVENT           ON  EVENT.ID         = REG.IDEVENT
				INNER JOIN CREDENTIALS AS CREDENTIAL ON  REG.IDCREDENTIAL = CREDENTIAL.ID
				INNER JOIN PRIVILEGES AS PRIVS       ON  PRIVS.ID         = CREDENTIAL.PRIVILEGE_ID
			 	INNER JOIN USERS AS USR              ON  USR.ID           = CREDENTIAL.USER_ID;
                                
                                



												
                                
                                

				
