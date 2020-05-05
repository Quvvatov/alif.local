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
            
            $userid = $values[0];
            $sendby = $values[1];
            $orderid = $values[2];
            
            if (!is_numeric($userid)) {
                $output->writeln(sprintf('<error>Первый аргумент должен быть INTEGER!</error>'));
                Loger::write('Первый аргумент должен быть INTEGER!');
                exit;
            }
            
            if (!is_numeric($orderid)) {
                $output->writeln(sprintf('<error>Третий аргумент должен быть INTEGER!</error>'));
                Loger::write('Третий аргумент должен быть INTEGER!');
                exit;
            }
            
            if ($sendby != 'phone' && $sendby != 'mail'){
                $output->writeln(sprintf('<error>Ошибка второго аргумента.</error>'));
                $output->writeln(sprintf('<error>Аргумент должен содержать phone или mail.</error>'));
                Loger::write('Аргумент должен содержать phone или mail!');
                exit;
            } else $output->writeln(sprintf(Controller::run($userid, $sendby, $orderid)));
            
            return 0;
        }
    }    