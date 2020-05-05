<?php
    namespace Console\App\Commands;
    
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Input\InputArgument;
    use Console\App\Controllers\MainController as Controller;
    use Console\App\Loger\Loger as Loger;
    
    class SendNotify extends Command
    {
        protected function configure()
        {
            $this->setName('send')
            ->setDescription('Отправляем данные покупателю.')
            ->setHelp('Можно отправить информацию о товаре покупателю.')
           ->addArgument('values', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'Обязательные аргументы отсутствуют.');
        }
        
        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $output->writeln(sprintf('Отправляем...'));
            $values = $input->getArgument('values');
            
            // можно на входе принять userid, но придется игнорировать таблицу заказов.
            // но я решил использовать orderid, потому что уведомления отправляеться после оформлении заказа,
            // а заказы храняться в кокм-то таблице. В данном проекте есть таблица orders
            $orderid = $values[0]; 
            $sendby = $values[1]; // action для выбора - отправить по смс или по почте?!
            
            if (!is_numeric($orderid)) {
                $output->writeln(sprintf('<error>Ошибка: первый аргумент должен быть INTEGER!</error>'));
                Loger::write('Ошибка: первый аргумент должен быть INTEGER!');
                exit;
            }
            
            if ($sendby != 'phone' && $sendby != 'mail'){
                $output->writeln(sprintf('<error>Ошибка второго аргумента.</error>'));
                $output->writeln(sprintf('<error>Аргумент должен содержать phone или mail.</error>'));
                Loger::write('Аргумент должен содержать phone или mail!');
                exit;
            } else $output->writeln(sprintf(Controller::run($sendby, $orderid)));
            
            return 0;
        }
    }    