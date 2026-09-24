import {
	existsSync,
	mkdirSync,
	rmSync
} from 'node:fs';

import {
	execSync
} from 'node:child_process';

import {
	readFile
} from 'node:fs/promises';

import {
	resolve
} from 'node:path';


const root = process.cwd();

const packageJson = JSON.parse(
	await readFile(
		resolve(
			root,
			'package.json'
		),
		'utf8'
	)
);

const version = packageJson.version || '0.0.0';

const releaseDir = resolve(
	root,
	'releases'
);

const stagingDir = resolve(
	releaseDir,
	'web'
);

const zipFile = resolve(
	releaseDir,
	`websiteni-starter-theme-v${version}.zip`
);


/**
 * Reset release directory.
 */

if (
	existsSync(
		releaseDir
	)
) {
	rmSync(
		releaseDir,
		{
			recursive: true,
			force: true
		}
	);
}

mkdirSync(
	stagingDir,
	{
		recursive: true
	}
);


/**
 * Copy theme files into a clean staging directory.
 */

execSync(
	[
		'rsync -a',
		'--exclude=".git"',
		'--exclude=".DS_Store"',
		'--exclude="node_modules"',
		'--exclude="releases"',
		'--exclude=".idea"',
		'--exclude=".vscode"',
		'./',
		`"${stagingDir}/"`
	].join(' '),
	{
		stdio: 'inherit'
	}
);


/**
 * Create ZIP.
 */

execSync(
	`cd "${releaseDir}" && zip -rq "${zipFile}" web`,
	{
		stdio: 'inherit'
	}
);


/**
 * Remove temporary staging folder.
 */

rmSync(
	stagingDir,
	{
		recursive: true,
		force: true
	}
);


console.log('');
console.log(
	`Package created: releases/websiteni-starter-theme-v${version}.zip`
);