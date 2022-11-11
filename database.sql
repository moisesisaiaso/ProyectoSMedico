
CREATE DATABASE IF NOT EXISTS citamedica;
USE citamedica;

SElECT * FROM pacientes;

CREATE TABLE IF NOT EXISTS users(
id            	      int(255) auto_increment not null,
name          	      VARCHAR(100),
email         	      VARCHAR(200),
email_verified_at     datetime,
password              VARCHAR(255),
image                 VARCHAR(255),
remember_token        VARCHAR(255),
created_at            datetime,
updated_at            datetime,
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS pacientes(
    id                int(255) auto_increment not null,
    user_id           int(255),
    name              VARCHAR(255),
    historiaClinica   VARCHAR(255),
    sexo              VARCHAR(255),
    grupoSanguineo    VARCHAR(255),
    fechaNacimiento   VARCHAR(255),
    edad              VARCHAR(255),
    peso              VARCHAR(255),
    talla             VARCHAR(255),
    indiceMC          VARCHAR(255),
    presionArterial   VARCHAR(255),
    created_at        datetime,
    updated_at        datetime,
    CONSTRAINT pk_pacientes PRIMARY KEY(id),
    CONSTRAINT fk_pacientes_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;



CREATE TABLE IF NOT EXISTS lugaresA(
    id                  int(255) auto_increment not null,
    paciente_id         int(255),
    user_id             int(255),
    tipo_atencion       VARCHAR(255),
    lugar_atencion      VARCHAR(255),
    grupo_prioritario   VARCHAR(255),
    created_at          datetime,
    updated_at          datetime,
    CONSTRAINT pk_lugaresA PRIMARY KEY(id),
    CONSTRAINT fk_lugaresA_pacientes FOREIGN KEY(paciente_id) REFERENCES pacientes(id),
    CONSTRAINT fk_lugaresA_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;



CREATE TABLE IF NOT EXISTS motivosC(
    id                        int(255) auto_increment not null,
    paciente_id               int(255),
    user_id                   int(255),
    planificacion_familiar    VARCHAR(255),
    descripcion_motivo        text,
    descripcion_enfermedad    text,
    created_at                datetime,
    updated_at                datetime,
    CONSTRAINT pk_motivosC PRIMARY KEY(id),
    CONSTRAINT fk_motivosC_pacientes FOREIGN KEY(paciente_id) REFERENCES pacientes(id),
    CONSTRAINT fk_motivosC_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;



CREATE TABLE IF NOT EXISTS antecedentes(
    id               int(255) auto_increment not null,
    paciente_id      int(255),
    user_id          int(255),
    personales       VARCHAR(255),
    familiares       VARCHAR(255),
    obstetricos      VARCHAR(255),
    ginecologos      VARCHAR(255),
    vacunacion       VARCHAR(255),
    created_at       datetime,
    updated_at       datetime,
    CONSTRAINT pk_antecedentes PRIMARY KEY(id),
    CONSTRAINT fk_antecedentes_pacientes FOREIGN KEY(paciente_id) REFERENCES pacientes(id),
    CONSTRAINT fk_antecedentes_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;



CREATE TABLE IF NOT EXISTS signosV(
    id                     int(255) auto_increment not null,
    paciente_id            int(255),
    user_id                int(255),
    presionArS             VARCHAR(255), 
    presionArD             VARCHAR(255),
    presionArM             VARCHAR(255),
    temperatura            VARCHAR(255),
    peso                   VARCHAR(255),
    talla                  VARCHAR(255),
    iMC                    VARCHAR(255),
    perimetroAbdominal     VARCHAR(255),
    glucosaCapilar         VARCHAR(255),
    vHemoglobina           VARCHAR(255),
    vHemoglobinaC          VARCHAR(255),
    created_at             datetime, 
    updated_at             datetime,
    CONSTRAINT pk_signosV PRIMARY KEY(id),
    CONSTRAINT fk_signosV_pacientes FOREIGN KEY(paciente_id) REFERENCES pacientes(id),
    CONSTRAINT fk_signosV_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;





CREATE TABLE IF NOT EXISTS tratamientos(
    id                int(255) auto_increment not null,
    paciente_id       int(255),
    user_id           int(255),
    descripcion       text,
    created_at        datetime,
    updated_at        datetime,
    CONSTRAINT pk_tratamientos PRIMARY KEY(id),
    CONSTRAINT fk_tratamientos_pacientes FOREIGN KEY(paciente_id) REFERENCES pacientes(id),
    CONSTRAINT fk_tratamientos_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;



CREATE TABLE IF NOT EXISTS examenesF(
    id                 int(255) auto_increment not null,
    paciente_id        int(255),
    user_id            int(255),
    examen_path        VARCHAR(255),
    descripcion        text,
    created_at         datetime,
    updated_at         datetime,
    CONSTRAINT pk_examenesF PRIMARY KEY(id), 
    CONSTRAINT fk_examenesF_pacientes FOREIGN KEY(paciente_id) REFERENCES pacientes(id),
    CONSTRAINT fk_examenesF_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;





CREATE TABLE IF NOT EXISTS diagnosticos(
    id                 int(255) auto_increment not null,
    paciente_id        int(255),
    user_id            int(255),
    observaciones      text,
    created_at         datetime,
    updated_at         datetime,
    CONSTRAINT pk_diagnosticos PRIMARY KEY(id),
    CONSTRAINT fk_diagnosticos_pacientes FOREIGN KEY(paciente_id) REFERENCES pacientes(id),
    CONSTRAINT fk_diagnosticos_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;