# tp-poo

Sistema de Gestão de Aeroportos


-> A organizaçao do projeto é a seguinte:

    - classes
        - Contém as classes principais(Aeroporto, aeronave, cliente, etc)

    - docs
        - Contém o pdf com os requisitos do sistema

    - exemplos_php
        - Contém os exemplos utilizados no laboratório nas aulas

    - libs
        - Contém as libs do projeto, como por exemplo o persist e o libs da API do Maps

    - sistema
        - Contém os arquivos do Sistema e do Site. O projeto deve ser executado a partir do 'sistema.php' ou do 'site.php'.

        - O Sistema foi pensado para ser utilizado pelo admin do Sistema de Gestão. Com ele é possível:
            - Cadastrar, editar e ver Aeroportos
            - Cadastar, editar e ver Companhias Aereas
            - Cadastrar, editar e ver os Tripulantes
            - e outras coisas nesse sentido de um usuário admin

        - O Site foi pensado para ser utilizado como um cliente do Sistema de Gestão. Com ele é possivel:
            - Pesquisar as viagens disponíveis
            - Cadastrar, editar e ver os clientes e passageiros
            - e outras coisas nesse sentido de um usuário cliente

    - testes
        - Contém os testes feitos nas classes principais.

-> Como utilizamos o persist, a maioria das conexões entre as classes foram feitas a partir do 'index' dos objetos salvos pelo persist.



" Professor, não tive tempo para implementar o Subject em todas as classes. Implementei somente no Aeroporto. Seria a mesma ideia para todas as outras. Por favor, considere o padrão Observer como implementado.

Também implementei o Facade para a classe Sistema e as classes chamadas pelo Sistema.

A API do Maps retorna, para um determinado endereço, as coordenadas daquele endereço e a rota do Veículo é populado com uma lista de coordenadas."
                                                                                                                                - Joao