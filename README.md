# Księgarnia - prosta aplikacja webowa sklepu internetowego

## Co to za strona?
 
Jest to strona internetowa księgarni, na której można przeglądać i kupować książki online. Na stronie można znaleźć różne kategorie książek, a także informacje o autorach.

## Dlaczego powstała ta strona?
 
Strona powstała, aby umożliwić klientom łatwe i wygodne zakupy książek online. Dzięki temu klienci mogą przeglądać ofertę księgarni, wybierać interesujące ich pozycje i dokonywać zakupów w dowolnym momencie i miejscu.

## Jak działa ta strona?
 
Ta strona internetowa działa na bazie aplikacji webowej napisanej w języku php + JS. Strona korzysta z bazy danych do przechowywania informacji o książkach, klientach i zamówieniach.

## Wymagania
-PHP

-HTML5

-JavaScript

-CSS

-SQL (np. MySQL, PostgreSQL)

## Funkcjonalności
-Zarządzanie książkami: dodawanie, edycja, usuwanie oraz przeglądanie książek.

-Zarządzanie zamówieniami: przeglądanie, akceptacja, odrzucanie i realizacja zamówień.

-Autentykacja i autoryzacja użytkowników.

-Koszyk zakupowy oraz proces składania zamówienia.


## Instalacja i konfiguracja
Sklonuj repozytorium na swój lokalny komputer:

-git clone https://github.com/DorianMikolajczyk/ksiegarnia.git

-Przejdź do folderu z projektem:

-cd ksiegarnia

-Utwórz bazę danych SQL (np. MySQL, PostgreSQL) dla aplikacji.

-Otwórz plik konfiguracyjny bazy danych (config/db.php) i wprowadź odpowiednie dane dotyczące bazy danych (nazwa, host, użytkownik, hasło).

-Uruchom lokalny serwer, aby przetestować aplikację.

## Użytkowanie
Aplikacja pozwala na zarządzanie danymi za pomocą phpMyAdmin - narzędzia do zarządzania bazą danych MySQL przez interfejs WWW. Dzięki phpMyAdmin możemy przeglądać, modyfikować, dodawać i usuwać tabele oraz rekordy w bazie danych, zarządzać użytkownikami bazy danych oraz ich uprawnieniami.

-Aby korzystać z phpMyAdmin, upewnij się, że masz zainstalowane oprogramowanie na swoim serwerze i skonfigurowane zgodnie z dokumentacją: https://www.phpmyadmin.net/docs/

-Po zainstalowaniu i skonfigurowaniu phpMyAdmin, otwórz przeglądarkę internetową i przejdź do adresu URL phpMyAdmin (zwykle http://localhost/phpmyadmin lub http://adres_serwera/phpmyadmin). Zaloguj się, korzystając z danych dostępowych do bazy danych, które wprowadziłeś wcześniej do pliku konfiguracyjnego (config/db.php).

W phpMyAdmin możesz przeglądać strukturę bazy danych, zarządzać tabelami, wprowadzać zmiany w rekordach, a także tworzyć kopie zapasowe bazy danych i importować dane z plików SQL.

https://user-images.githubusercontent.com/91832822/233770222-54d83fa5-8a92-4e5f-9689-0c81def28bb2.mp4
