##Księgarnia to prosta aplikacja webowa stworzona w celu zarządzania księgarnią internetową. 
#Aplikacja pozwala na dodawanie, edycję i usuwanie książek, a także zarządzanie zamówieniami klientów. Projekt został stworzony przez Dorian Mikołajczyk i znajduje się pod adresem: https://github.com/DorianMikolajczyk/ksiegarnia

Wymagania
PHP 7.4+
HTML5
JavaScript
CSS3
SQL (np. MySQL, PostgreSQL)
Funkcjonalności
Zarządzanie książkami: dodawanie, edycja, usuwanie oraz przeglądanie książek.
Zarządzanie zamówieniami: przeglądanie, akceptacja, odrzucanie i realizacja zamówień.
Autentykacja i autoryzacja użytkowników.
Wyszukiwanie książek na podstawie kategorii, tytułu, autora lub słów kluczowych.
Koszyk zakupowy oraz proces składania zamówienia.
Instalacja i konfiguracja
Sklonuj repozytorium na swój lokalny komputer:
bash
Copy code
git clone https://github.com/DorianMikolajczyk/ksiegarnia.git
Przejdź do folderu z projektem:
bash
Copy code
cd ksiegarnia
Utwórz bazę danych SQL (np. MySQL, PostgreSQL) dla aplikacji.

Otwórz plik konfiguracyjny bazy danych (config/db.php) i wprowadź odpowiednie dane dotyczące bazy danych (nazwa, host, użytkownik, hasło).

Uruchom migracje, aby utworzyć strukturę bazy danych:

Copy code
php migration.php
Zainstaluj zależności dla frontendu (np. Bootstrap, jQuery) za pomocą narzędzia do zarządzania pakietami, takiego jak npm lub yarn.

Uruchom lokalny serwer, aby przetestować aplikację:

Copy code
php -S localhost:8000
Otwórz przeglądarkę internetową i przejdź do adresu http://localhost:8000, aby zobaczyć działającą aplikację.
 
Co to za strona?
 
To jest strona internetowa księgarni, na której można przeglądać i kupować książki online. Na stronie można znaleźć różne kategorie książek, opisy i recenzje, a także informacje o autorach.
 
Dlaczego powstała ta strona?
 
Strona powstała, aby umożliwić klientom łatwe i wygodne zakupy książek online. Dzięki temu klienci mogą przeglądać ofertę księgarni, wybierać interesujące ich pozycje i dokonywać zakupów w dowolnym momencie i miejscu.
 
Jak korzystać z tej strony?
 
Aby korzystać z tej strony, wystarczy wejść na stronę internetową i przeglądać dostępne kategorie książek. Można także wyszukiwać konkretne tytuły lub autorów. Po wybraniu interesującej książki można dodać ją do koszyka i przejść do kasy, gdzie należy podać swoje dane i dokonać płatności.
 
Jak działa ta strona?
 
Ta strona internetowa działa na bazie aplikacji webowej napisanej w języku php + JS. Strona korzysta z bazy danych do przechowywania informacji o książkach, klientach i zamówieniach. Strona jest hostowana na serwerze ubuntu.

https://user-images.githubusercontent.com/91832822/233770222-54d83fa5-8a92-4e5f-9689-0c81def28bb2.mp4
