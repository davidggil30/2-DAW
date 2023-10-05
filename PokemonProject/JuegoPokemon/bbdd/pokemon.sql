create database if not exists Pokemon;

use Pokemon;
create table if not exists InitPokemon(
	specie varchar(255),
    type varchar(255),
    id int primary key,
    level int,
    maxHP int, 
    currentHP int, 
    attack int,
    specialAttack int,
    defense int,
    specialDefense int,
    speed int
);

insert into InitPokemon values("BULBASAUR","GRASS", 001, 5, 45, 45, 49, 65, 49, 65, 45),
							   ("CHARMANDER", "FIRE", 004, 5, 39, 39, 52, 60, 43, 50, 65),
                               ("SQUIRTLE", "WATER", 007, 5, 44, 44, 48, 50, 65, 64, 43);